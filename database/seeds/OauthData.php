<?php

use Illuminate\Database\Seeder;

class OauthData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime();
        \DB::table('oauth_clients')->insert([
            'client_id' => 'xcon',
            'client_secret' => 'ggftkfml3rstoj3x',
            'redirect_uri' => null,
            'grant_types' => 'password refresh_token client_credentials urn:ietf:params:oauth:grant-type:jwt-b',
            'scope' => null,
            'user_id' => 1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        \DB::table('oauth_jwt')->insert([
            'client_id' => 'xcon',
            'private_key' => '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQCfP+nzqcmwhn7aIb+lt24oOsHk/+zMtRNWay9ssdYez2mclODC
9S8SE0wlzdjhnXyjr54S6PP9oD+tIXBpEI48tquJYFjqu/KTXcG79/08fKllHrXc
sta2gOD/RmGJb/3sCt+ZO94l8Cx6Dc2ygjV9YQ5iboJvacP4IPO01+maJwIDAQAB
AoGAFw4ZwL0EBhpyowHfzQ4RVKGtEIo8riZI9mnuI75bUXqVv6WOJKt6dRN2IsL6
cy9prAjwyawQJtfcYCRHMe7DqKwSnV6rSIoY5NB4UKgVJLlf87BXm0VVU1kIg7Vo
sbHK6xZs/rAX+Fltg5NDLu4znat7E0Bbgk7E+3xZMzHnEYECQQDLLpvXbzIQX7kQ
oFzZYazIfbrxl9NjL9CUMm6Tfe5K/kLxIHKVnVigzzqCU4ORMrwyVdxW9mwH8VVv
GopBvOtDAkEAyKWvVb0PuqUDff2CgiyzJLgMKjjrmy8VBkOXOvj/4VAKoRVaiEk1
UBHH8S1H8V+upMWCVHNVj2L6ueya9irdTQJBAJck5Okt3qAvlQu5P1i2QEIkxZxS
xP1T5GVZ3sf5Nfqziji1WofRtMxrW6r3VTf99eG73V0TkumVrWgo5hBg6OECQQCY
56KJbS2KZ+wUXFfTiervJY6nsn7h4OxdvK6H0290LcIb5aD7UQbewN4kzgQQToFR
se5TGx1tytkVTNj+lcXVAkAiJ4pPwRX7yYw6D+/8eg64P6wvFavpl7SSopFsJTZz
av+UQXsfVGg/WbxQr9bVSKd8rZstN6aYjuyHRC7Q6B0O
-----END RSA PRIVATE KEY-----',
            'public_key' => 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAAAgQCfP+nzqcmwhn7aIb+lt24oOsHk/+zMtRNWay9ssdYez2mclODC9S8SE0wlzdjhnXyjr54S6PP9oD+tIXBpEI48tquJYFjqu/KTXcG79/08fKllHrXcsta2gOD/RmGJb/3sCt+ZO94l8Cx6Dc2ygjV9YQ5iboJvacP4IPO01+maJw==',
            'subject' => 'xcon',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        \DB::table('oauth_users')->insert([
            'username' => 'user_xcon',
            'password' => 'd42652bdb071347323f0c9dc40fcf9309cdfe034',
            'first_name' => 'Albert',
            'last_name' => 'Abdonor',
            'email' => 'albert.abdonor@gmail.com',
            'email_verified' => 1,
            'scope' => 'general',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        \DB::table('oauth_scopes')->insert([
            'is_default' => 1,
            'scope' => 'general',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
