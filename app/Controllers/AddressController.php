<?php

namespace App\Controllers;

use App\Http\Paginator;
use App\Http\Response;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;

class AddressController extends BaseController
{


    public function ward()
    {

        $items = Ward::paginate($this->getPerPage());
        $total = Ward::count();

        $paginator =  new Paginator($this->request, $items, $total);

        // thêm các tham số vào url trong các link phân trang
        // (khi cần thiết, ví dụ tham số filter city_id=2)
        $paginator->appends('city_id', '2');

        // Thêm mảng các tham số
        // $paginator->appendArray([
        //     'param1'   => 1,
        //     'param2'    => 2
        // ]);

        $paginator->onEachSide(2); // hiển thị 2 trang trước và sau trang hiện tại

        // nếu ajax request sẽ render list và trả về kết quả
        if ($this->request->ajax()) {
            // lưu ý render trực tiếp bằng View engine object $this->view->render()
            $html = $this->view->render('address/ward-list', ['items' => $items, 'paginator' => $paginator]);
            return $this->json([
                'data'  => $html
            ]);
        }

        return $this->render('address/ward', ['items' => $items, 'paginator' => $paginator]);
    }

    public function deleteWard()
    {
        $id = $this->request->post('id'); // id cua Ward

        $ward = Ward::find($id);

        // Nếu ajax request trả về json
        if ($this->request->ajax()) {

            if ($ward) {
                if ($ward->delete()) {
                    return $this->json([
                        'message'  => $ward->name . ' has been deleted successfully.'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message'  => 'Unable to delete Ward'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message'   => 'Ward ID does not exists!'
            ], Response::HTTP_NOT_FOUND);
        }

        // delete và redirect
        if ($ward) {
            if ($ward->delete()) {
                session()->setFlash(\FLASH::SUCCESS, $ward->name . ' has been deleted successfully.');
            } else {
                session()->setFlash(\FLASH::ERROR, "Unable to delete Ward");
            }
        } else {
            session()->setFlash(\FLASH::ERROR, 'Ward ID does not exists!');
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }
}
