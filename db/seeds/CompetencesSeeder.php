<?php


use Phinx\Seed\AbstractSeed;

class CompetencesSeeder extends AbstractSeed
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
        $filename =  'db/seeds/competences.json';
        $file = fopen($filename, 'r');
        $contents = fread($file, filesize($filename));
        $cont = json_decode($contents, true);
        // dd($cont);
        $competences = [];
        foreach ($cont as $k => $v) {
            $competences[] = [
                'titleCompetenceID' => $v['titleCompetenceID'],
                'techno' => $v['techno']
            ];
        }
        $this->insert('titleCompetences', $competences);
    }
}
