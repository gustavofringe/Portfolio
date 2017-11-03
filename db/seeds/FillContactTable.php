<?php
use Phinx\Seed\AbstractSeed;
class FillContactTable extends AbstractSeed
{

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $filename =  'db/seeds/contact.json';
        $file = fopen($filename, 'r');
        $contents = fread($file, filesize($filename));
        $cont = json_decode($contents, true);
        // dd($cont);
        $contacts = [];
        foreach ($cont as $k => $v) {
            $contacts[] = [
                'contactID' => $v['contactID'],
                'lastname' => $v['lastname'],
                'firstname' => $v['firstname'],
                'email' => $v['email'],
                'phone' => $v['phone'],
                'society' => $v['society'],
                'msg' => $v['msg'],
                'date' => $v['date'],
            ];
        }
        $this->insert('contacts', $contacts);
    }
}
