# Update timestamps

```sh

update wards set created_at = FROM_UNIXTIME( UNIX_TIMESTAMP('2020-04-30 14:53:27') + FLOOR(0 + (RAND() * 63072000)) );

update districts set created_at = FROM_UNIXTIME( UNIX_TIMESTAMP('2020-04-30 14:53:27') + FLOOR(0 + (RAND() * 63072000)) );

update cities set created_at = FROM_UNIXTIME( UNIX_TIMESTAMP('2020-04-30 14:53:27') + FLOOR(0 + (RAND() * 63072000)) );

```
