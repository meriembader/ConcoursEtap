<?php

namespace App\Export;

use App\Candidat;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class Export implements FromCollection, WithMapping, WithColumnFormatting, WithHeadings, ShouldAutoSize, WithEvents
{
    private $post_id;
    private $candidat;
    private $keyword;


    public function __construct($post_id, $keyword)
    {
        $this->keyword = $keyword;

        $this->post_id = $post_id;
        $this->candidat = $this->collection();

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->post_id !== 'xlsx' && $this->keyword !== 'undefined') {
            return Candidat::select('id', 'poste_id', 'id_dossier', 'cin', 'last_name', 'first_name', 'birthday', 'mobile_phone', 'level_studies', 'preparatory_study', 'Bachelor_degree', 'last_year_degree_without_pfe', 'conformite_age', 'conformite_cin', 'conformite_diplome', 'conformite_permis', 'conformite_note', 'conformite_autre', 'score_1', 'score_2', 'user_id', 'date_of_obtaining_a_driving_license')
                ->where('poste_id', 'like', '%' . $this->post_id . '%')
                ->orWhere('last_name', 'like', '%' . $this->keyword . '%')
                ->orWhere('first_name', 'like', '%' . $this->keyword . '%')
                ->orWhere('cin', 'like', '%' . $this->keyword . '%')->get();
        } else
            if ($this->post_id !== 'xlsx') {
                return Candidat::select('id', 'poste_id', 'id_dossier', 'cin', 'last_name', 'first_name', 'birthday', 'mobile_phone', 'level_studies', 'preparatory_study', 'Bachelor_degree', 'last_year_degree_without_pfe', 'conformite_age', 'conformite_cin', 'conformite_diplome', 'conformite_permis', 'conformite_note', 'conformite_autre', 'score_1', 'score_2', 'user_id', 'date_of_obtaining_a_driving_license')
                    ->where('poste_id', $this->post_id)
                    ->get();
            } else if ($this->keyword !== 'undefined') {

                return Candidat::select('id', 'poste_id', 'id_dossier', 'cin', 'last_name', 'first_name', 'birthday', 'mobile_phone', 'level_studies', 'preparatory_study', 'Bachelor_degree', 'last_year_degree_without_pfe', 'conformite_age', 'conformite_cin', 'conformite_diplome', 'conformite_permis', 'conformite_note', 'conformite_autre', 'score_1', 'score_2', 'user_id', 'date_of_obtaining_a_driving_license')
                    ->where('cin', 'like', '%' . $this->keyword . '%')
                    ->where('first_name', 'like', '%' . $this->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $this->keyword . '%')
                    ->get();
            } else {
                return Candidat::select('id', 'poste_id', 'id_dossier', 'cin', 'last_name', 'first_name', 'birthday', 'mobile_phone', 'level_studies', 'preparatory_study', 'Bachelor_degree', 'last_year_degree_without_pfe', 'conformite_age', 'conformite_cin', 'conformite_diplome', 'conformite_permis', 'conformite_note', 'conformite_autre', 'score_1', 'score_2', 'user_id', 'date_of_obtaining_a_driving_license')->get();
            }
    }

    public function map($candidat): array
    {
        $age = '';
        $cin = '';
        $diplome = '';
        $permis = '';
        $note = '';
        $autre = '';
        $prepa = '';
        if ($candidat->conformite_age == 'yes') {
            $age = 'oui';
        } else if ($candidat->conformite_age == 'no') {
            $age = 'non';
        }
        if ($candidat->conformite_cin == 'yes') {
            $cin = 'oui';
        } else if ($candidat->conformite_cin == 'no') {
            $cin = 'non';
        }

        if ($candidat->conformite_diplome == 'yes') {
            $diplome = 'oui';
        } else if ($candidat->conformite_diplome == 'no') {
            $diplome = 'non';
        }

        if ($candidat->conformite_permis == 'yes') {
            $permis = 'oui';
        } else if ($candidat->conformite_permis == 'no') {
            $permis = 'non';
        }
        if ($candidat->conformite_note == 'yes') {
            $note = 'oui';
        } else if ($candidat->conformite_note == 'no') {
            $note = 'non';
        }
        if ($candidat->conformite_autre == 'yes') {
            $autre = 'oui';
        } else if ($candidat->conformite_autre == 'no') {
            $autre = 'non';
        }
        if ($candidat->preparatory_study == 'yes') {
            $prepa = 'oui';
        } else if ($candidat->preparatory_study == 'no') {
            $prepa = 'non';
        }
        return [
            $candidat->id,
            $candidat->id_dossier,
            $candidat->post()->first()->reference,
            $candidat->user->cin,
            $candidat->last_name,
            $candidat->first_name,
            date('d-m-Y', strtotime($candidat->birthday)),
            $candidat->mobile_phone,
            $candidat->level_studies,
            $prepa,
            number_format((float)$candidat->Bachelor_degree, 2, ',', ''),
            number_format((float)$candidat->last_year_degree_without_pfe, 2, ',', ''),
            $age,
            $cin,
            $diplome,
            $permis,
            $note,
            $autre,
            $candidat->date_of_obtaining_a_driving_license,
            $candidat->score_1 ? number_format($candidat->score_1, 2, ',', '') : 'null',
            $candidat->score_2 ? number_format($candidat->score_2, 2, ',', '') : 'null',
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => '',
            'B' => '',
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'ID Dossier',
            'Référence du poste',
            'cin',
            'nom',
            'prénom',
            'date de naissance',
            'Téléphone',
            "Niveau d'étude",
            "étude préparatoire",
            "Moyenne Baccaloreat",
            "Moyenne de la dernière année d'étude sans PFE",
            "Conformite age",
            "Conformite cin",
            "Conformite diplome",
            "Conformite permis de conduire",
            "Conformite note",
            "autre Conformite",
            "Date d'obtention de permis de conduire",
            'Score 1',
            'Score 2',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:N1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }

}
