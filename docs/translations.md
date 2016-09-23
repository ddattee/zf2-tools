Translation Generator
=====================

Translation generator generate .mo file from any .po found in the configurated path.
<pre>
return [
    'translator' => [
        'translation_file_patterns' => [
            'type'     => 'gettext',
            'base_dir' => 'PATH/TO/PO/FILES'
        ]
    ]
];
</pre>

Currently translation generator only support gettext adapter.
MO files will be generated at the same level than the PO files and with the same names.
