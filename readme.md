Install
-
- Fill: TWITCH_API_CLIENT_ID at .env
- Migrate: php artisan migrate
- Seed: php artisan db:seed --class=DemoSetSeeder


About
-
Streaming list:
/api/v1/streams

Default ip-filter: 127.0.0.1

Filter and pagination example. Game_id is an internal identity of Game.

`/api/v1/streams?page[number]=0&filter[game_id]=1&filter[from]=2017-11-26 12:17:23&filter[to]=2017-11-26 13:17:23`

`/api/v1/streams/viewersCount?filter[game_id]=1&filter[from]=2017-11-26 12:17:23&filter[to]=2017-11-26 13:17:23`