<?php

$section1 = [
	'id' => 'welcome',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'rows' => [
		[
			'class' => 'align-items-end',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-7',
					'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'Pretitle',
							'props' => [
								'html' => 'iPerformX proudly present',
							],

						],
						[
							'component' => 'MxrLogo',
							'props' => [
								'html' => 'MissionXr',
							],

						],
						[
							'component' => 'Summary',
							'props' => [
								'html' => 'The Future of Flight Training',
							],
						],
						[
							'component' => 'Paragraph',
							'props' => [
								'html' => 'MissionXR seamlessly integrates AI, simulation, and remote instruction for comprehensive, efficient training.',
							],

						],
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'discover how...',
								'href' => '#section-2',
							],

						],
					],
				],
			],
		],
	],
];

$page = [
	"sections" => [
		$section1,
	],
	'meta' => [
		'title' => 'Mission XR',
		'description' => 'meta description of iPerformX MissionXR',
	],
];