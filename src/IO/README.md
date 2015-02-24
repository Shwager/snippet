#How To
<pre>
$array = [
            'module' => [
                'Application' => [
                    'src' => [
                        'Application' => [
                            'Controller',
                            'Parser'
                   ]
                    ],
                    'config' => ['last'],
                    'view' => [
                        'error',
                        'layout',
                        'application' => [
                            'index',
                            'contact'
                   ],
                        'partials' => ['fii', 'b-i'],
                    ],
                ],
            ],
            'module2' => [
                'MFSchwager2' => [
                    'src2',
                    'config2' => ['last2'],
                    'view2' => ['last2'],
                ],
            ]
        ];
</pre>
<pre>
$arrayPath = new \Shwager\Parser\ArrayPath($array);
$adapter = new \Shwager\IO\ArrayPathAdapter($arrayPath);
$filesystem = new \Shwager\IO\Filesystem($adapter);
print_r($filesystem->getStructure());
</pre>