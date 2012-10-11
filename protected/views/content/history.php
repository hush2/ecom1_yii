<h3><?= $this->pageTitle ?></h3>

<h4>Pages You Have Viewed</h4>

<?php if (empty($pageHistory)): ?>
    <p>You have not yet viewed any pages.</p>

<?php else: ?>
    <?php foreach ($pageHistory as $history): ?>
        <div>
            <h4><?= CHtml::link($history->page->title, array("/page/{$history->page->id}"))?></h4>
            <p><?= $history->page->description ?><br />Last viewed: <?= date('F d, Y', strtotime($history->date_created)) ?></p>
        </div>
    <?php endforeach ?>
<?php endif ?>

<h4>PDFs You Have Viewed</h4>

<?php if (empty($pdfHistory)): ?>
    <p>You have not yet viewed any PDFs.</p>

<?php else: ?>
    <?php foreach ($pdfHistory as $history): ?>
        <div>
            <h4><?= CHtml::link($history->pdf->title, array("/view_pdf/{$history->pdf->tmp_name}"))?></h4>
            <p><?= $history->pdf->description ?><br />Last viewed: <?= date('F d, Y', strtotime($history->date_created)) ?></p>
        </div>
    <?php endforeach ?>

<?php endif ?>
