<?= CHtml::cssFile(Yii::app()->baseUrl . '/js/tinyeditor/tinyeditor.css') ?>
<?= CHtml::scriptFile(Yii::app()->baseUrl . '/js/tinyeditor/tiny.editor.packed.js') ?>

<script>
    var editor = new TINY.editor.edit('editor', {
        id: 'tinyeditor',
        width: 550,
        height: 175,
        cssclass: 'tinyeditor',
        controlclass: 'tinyeditor-control',
        rowclass: 'tinyeditor-header',
        dividerclass: 'tinyeditor-divider',
        controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
            'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
            'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
            'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', ],
        footer: true,
        fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
        xhtml: true,
        cssfile: 'custom.css',
        bodyid: 'editor',
        footerclass: 'tinyeditor-footer',
        toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
        resize: {cssclass: 'resize'}
    });

        var te = document.getElementById('submit');
        te.onclick = function() {
            editor.post();
        }

</script>