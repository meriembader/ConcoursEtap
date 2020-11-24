<html>



<body>
<style>
p{
    line-height:22px;
    font-size: 15px;
}
</style>
<table>
    <tr>
        <td style="width: 70%;">
            <h2>الشركة التونسية للأنشطة البترولية</h2>
            <p> (+216) 71 874 700 / (+216) 70 014 400 </p>
        </td>
        <td style="width: 30%">
            <img style="  height: 90px; width: 90px;" src="images/etapLogo.png">
        </td>
    </tr>
</table>
<div style="text-align: center;">
    <h1>استمارة التسجيل للخطة عدد :<?=$candidat->post->reference?></h1>
</div>

<table  border="1" style="width: 100%;">
<tbody>
    <tr>
    <td>
    <p>
        <b> معرف الملف: </b><?=$candidat->id_dossier?> <br>

        <b> الوظيفة: </b><?=$candidat->post->postname_AR?> <br>
        <b> الاسم: </b><?=$candidat->last_name?> <br>

        <b> اللقب: </b><?=$candidat->first_name?> <br>

        <b> رقم بطاقة التعريف الوطنية : </b><?=$candidat->cin?> <br>

        <b> تاريخ الولادة : </b><?= date('d/m/Y',strtotime($candidat->birthday))?> <br>

        <b> مكان الولادة : </b><?=$candidat->place_of_birth?> <br>

        <b> العنوان البريدي: </b><?=$candidat->addresse?>
        <hr>
        <b> رقم الهاتف : </b><?=$candidat->mobile_phone?> <br>
        <?php
        if ($candidat->user->email) {

            echo  ($candidat->user->email). " : الالكتروني  البريد" ;
        }
        ?>&nbsp;&nbsp;<hr>

        <?php

        if ($candidat->diplome_id) {
            echo "  الشهادة :". $candidat->diplome->titre_AR ;
        }

        ?>
        <?php

        if ($candidat->level_studies) {
            echo "  المستوى الدراسي  :". $candidat->level->titre_AR ;
        }

        ?><br>

        <?php

        if ($candidat->Bachelor_degree) {
            echo "معدل الباكالوريا :". $candidat->Bachelor_degree ;
        }
        ?><br>

        <?php
        
        if ($candidat->last_year_degree_without_pfe) {
            echo  " معدل العام الأخير من الدراسة دون مشروع نهاية الدراسة/أطروحة :". $candidat->last_year_degree_without_pfe ;
        }
        ?><br>

        <?php
        
        if ($candidat->note_pfe_avec_pfe) {
            echo "معدل العام الأخير من الدراسة مع مشروع نهاية الدراسة/أطروحة :". $candidat->note_pfe_avec_pfe ;
        }
        ?><br>

        <?php

        if ($candidat->note_pfe) {
            echo "عدد مشروع نهاية الدراسة/أطروحة :". $candidat->note_pfe ;
        }
        ?><br>

        <?php
        if($candidat->preparatory_study){

            if ($candidat->preparatory_study == 'yes') {
                echo "دراسات تحضيرية لكليات الهندسة : نعم" ;
            }
            else{
                echo "دراسات تحضيرية لكليات الهندسة : لا " ;

            }
        }
        ?><br>
        <?php
        if($candidat->conformite_attestation_inscription){
            if ($candidat->conformite_attestation_inscription =='yes') {
                echo " مسجل في مكتب التشغيل : نعم" ;
            }
            else{
                echo " مسجل في مكتب التشغيل : لا " ;

            }
        }
        ?><br>
        <?php

        if ($candidat->date_of_obtaining_a_driving_license) {
            echo " تاريخ الحصول على رخصة القيادة :". date('d/m/Y',strtotime($candidat->date_of_obtaining_a_driving_license)) ;
        
        }
        ?><br>
        <?php
        if($candidat->dip_m){
            if ($candidat->dip_m =='yes') {
                echo " شهادة ميكانيك : نعم" ;
            }
            else{
                echo " شهادة ميكانيك : لا " ;

            }
        }
        ?><br>
        
                - لقد قرأت ووافقت على جميع شروط ومنهجية المناظرة
        <br> - أؤكد أن جميع المعلومات التي تم إدخالها صحيحة
    </p>
 
    <p style=" text-align: left">
        <b> تم التسجيل في :</b><?= date('d/m/Y H:i:s',strtotime($candidat->created_at))?>
    </p>
    </td>
    </tr>
    <div style=" text-align: center">
    <span> جميع الحقوق محفوظة  ETAP © 2019 </span>
</div>
</tbody>

</table>





</html>
