<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($this->session->flashdata('error')) : ?>
<p class="unsuccess"><?php echo $this->session->flashdata('error'); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('success')) : ?>
<p class="success"><?php echo $this->session->flashdata('success'); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('login_success')) : ?>
<p class="success"><?php echo $this->session->flashdata('login_success'); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('login_failed')) : ?>
<p class="unsuccess"><?php echo $this->session->flashdata('login_failed'); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('registered')) : ?>
  <p class="success"><?php echo $this->session->flashdata('registered'); ?>
<?php endif; ?>

<div class="page-header">
<h2 >ETURIVIN TAITAJAT - Osaajapankki</h2>
</div>
<p>ETURIVIN TAITAJAT - Osaajapankki on Etelä-savon ammattiopiston (Esedu) ylläpitämä verkkopalvelu, jonka tarkoituksena on edistää opiskelijoiden työllistymistä.</p><br />
<p>Esedussa opiskelevana voit halutessasi edistää omaa työllistymistäsi lisäämällä osaajapankkiin yhteystietojesi lisäksi omaa koulutustasi ja osaamistasi koskevat tiedot sekä ylläpitää niitä.</p><br />
<p>- Työtä tarjoavat organisaatiot löytävät parhaat osaajat täältä.</p><br /><br />
<p>Ohjeet:</p>
<p>Kirjaudu ETURIVIN TAITAJAT - Osaajapankkiin omalla <b>@esedulainen.fi</b> sähköpostitunnuksellasi, täytä yhteystietosti, omaa koulutustasi, työkokemustasi, osaamistasi ja harrastuksiasi koskevat tiedot, ja pidä ne ajan tasalla. - Voit myöskin lisätä oman CV:n ja osaamisportfoliosi sekä linkin omille kotisivuillesi.</p>
<p>Tärkeintä on, että kirjaamasi tiedot ovat todenmukaisia, ja siten lisäävät luottamusta sinuun.</p>
<p>Silloin, kun et ole hakemassa aktiivisesti uutta työpaikkaa, voit poistaa tietosi tai laittaa ne näkymättömäksi.<br /> - Näkymättömäksi laitetut tiedot voit helposti palauttaa aktiiviseksi ja päivittää vastaamaan uutta tilannetta.</p><br /><br />
<i>ETURIVIN TAITAJAT - Osaajapankkiin kirjatut tiedot ovat kuitenkin Esedussa opiskelevan tai opiskelleen itsensä pankkiin kirjaamia, joten myös vastuu omien tietojen oikeellisuudesta on heillä itsellään. - Esedu ei vastaa Osaajapankkiin kirjatuista tiedoista eikä niiden käytöstä mahdollisesti aiheutuvista seuraamuksista.</i>
