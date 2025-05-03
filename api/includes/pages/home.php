<?php

$section1 = [
	'id' => 'welcome',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'rows' => [
		[
			'class' => 'align-items-end min-vh-100',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12 col-md-7',
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
								'href' => '#uniqueness',
							],

						],
					],
				],
			],
		],
	],
];
$section2 = [
	'id' => 'uniqueness',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'rows' => [
		[
			'class' => 'align-items-center min-vh-100',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12 col-md-5',
					'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'Pretitle',
							'props' => [
								'html' => 'Uniqueness',
							],

						],
						[
							'component' => 'MainTitle',
							'props' => [
								'html' => 'What Makes Mission XR Different',
							],

						],

						[
							'component' => 'UnorderedList',
							'props' => [
								'items' => [
									[
										'props' => [
											'html' => '<strong>AI-powered</strong>, immersive, and ready for real-world mission training',
										],
									],
									[
										'props' => [
											'html' => 'Evaluate student performance and <strong>personalize training</strong>',
										],
									],
									[
										'props' => [
											'html' => '<strong>Predict</strong> outcomes to address issues early',
										],
									],
									[
										'props' => [
											'html' => 'Keep <strong>humans in the loop</strong> to ensure precision and adaptability',
										],
									],

								],
							],

						],
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'our unique features...',
								'href' => '#features',
							],

						],
					],
				],
			],
		],
	],
];
$_section3 = [
	'id' => 'features',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'rows' => [
		[
			'class' => 'justify-content-center flex-column min-vh-100',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12',
//					'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'Pretitle',
							'props' => [
								'html' => 'Main Features',
							],
						],
						[
							'component' => 'MainTitle',
							'props' => [
								'html' => 'What mission-xr Can Do',
							],

						],
					],
				],
				[
					'class' => 'offset-sm-1 col-sm-12',
					//'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'TeaserList1',
							'props' => [

								'items' => [
									[
										'props' => [
											'title' => 'Prevent Learning Failure',
											'html' => 'Data centralization and AI-guided analysis allows the accurate monitoring of students’ educational paths. 
											The iPerformX Suite facilitates early intervention to prevent critical issues and avoid failures and dropouts. 
											AI recommendations and guidance ensure adherence to timelines and preparation standards.',
											'class' => 'col-sm-7'
										],
									],
									[
										'props' => [
											'title' => 'Dynamic and Effective Learning',
											'html' => 'Smart multimedia tools, always accessible to all students, create a comprehensive and personalized educational journey, 
											fostering a strong motivation for self-learning.
											AI-generated learning paths, supervised by Instructors, provide guidance to each student at every stage of their training experience.',
											'class' => 'col-sm-7'
										],
									],


								],
							],

						],
					],
				],
				[
					'class' => 'offset-sm-1 col-sm-12',
					//'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'The Virtual Training Environment...',
								'href' => '#vte',
							],

						],
					],
				],
			],
		],


	],
];
$section3 = [
	'id' => 'features',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'rows' => [
		[
			'class' => 'align-items-center min-vh-100',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12',
					//					'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'Pretitle',
							'props' => [
								'html' => 'Main Features',
							],
						],

						[
							'component' => 'MainTitle',
							'props' => [
								'html' => 'What mission-xr Can Do',
							],

						],
						[
							'component' => 'TeaserList1',
							'props' => [

								'items' => [
									[
										'props' => [
											'title' => 'Prevent Learning Failure',
											'html' => 'Data centralization and AI-guided analysis allows the accurate monitoring of students’ educational paths. 
											The iPerformX Suite facilitates early intervention to prevent critical issues and avoid failures and dropouts. 
											AI recommendations and guidance ensure adherence to timelines and preparation standards.',
											'class' => 'col-md-50perc'
										],
									],
									[
										'props' => [
											'title' => 'Dynamic and Effective Learning',
											'html' => 'Smart multimedia tools, always accessible to all students, create a comprehensive and personalized educational journey, 
											fostering a strong motivation for self-learning.
											AI-generated learning paths, supervised by Instructors, provide guidance to each student at every stage of their training experience.',
											'class' => 'col-md-50perc'
										],
									],


								],
							],

						],
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'The Virtual Training Environment...',
								'href' => '#vte',
							],

						],
					],
				],


			],
		],


	],
];
$section4 = [
	'id' => 'vte',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'rows' => [
		[
			'class' => '',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12 col-md-6 d-md-flex flex-column vh-100 justify-content-center sticky-top',
					'wrapper_class' => 'entry mb-0',
					'widgets' => [
						[
							'component' => 'Pretitle',
							'props' => [
								'html' => 'The Virtual Training Environment / 1',
							],

						],
						[
							'component' => 'MainTitle',
							'props' => [
								'html' => 'Immersive simulation in an Adaptive Training Environment',
							],

						],
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'more...',
								'href' => '#vte-2',
							],

						],
					],
				],
				[
					'class' => 'col-sm-12 col-md-6',
					//'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'TeaserList2',
							'props' => [
								'items' => [
									[
										'props' => [
											'title' => 'PLAN',
											'summary' => 'AI-Driven Mission Planning',
											'html' => 'Plan missions in 2D, 3D, and extended reality environments with AI support.',
										],
									],
									[
										'props' => [
											'title' => 'BRIEF',
											'summary' => 'Interactive Mission Briefing',
											'html' => 'AI-generated mission briefs that are clear, engaging, and interactive.',
										],
									],
									[
										'props' => [
											'title' => 'FLY',
											'summary' => 'Immersive Flight Simulations',
											'html' => 'Experience ultra-realistic scenarios in high-fidelity virtual simulators.',
										],
									],
									[
										'props' => [
											'title' => 'DEBRIEF',
											'summary' => 'AI-Powered Debriefing',
											'html' => 'Review key mission events with AI-tagged highlights for faster, smarter debriefs.',
										],
									],

								],
							],

						],

					],
				],
			],
		],
	],
];

$section5 = [
	'id' => 'vte-2',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
//	'container_class' => 'd-flex flex-column justify-content-center min-vh-100',
	'rows' => [
		[
			'class' => 'align-items-center min-vh-100',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12',
					//					'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'Pretitle',
							'props' => [
								'html' => 'The Virtual Training Environment / 2',
							],
						],
						[
							'component' => 'TeaserList3',
							'props' => [

								'items' => [
									[
										'props' => [
											'summary' => 'Remote Instruction',
											'title' => 'Increase learning success',
											'html' => 'Instructors can guide you live, from anywhere in the world.',
											'class' => 'col-md-33perc pr-md-5'
										],
									],
									[
										'props' => [
											'summary' => 'Better preparation',
											'title' => 'Targeted Remediation',
											'html' => 'AI identifies areas for improvement and suggests next steps for progress.',
											'class' => 'col-md-33perc pr-md-5'
										],
									],
									[
										'props' => [
											'summary' => 'Augment learning',
											'title' => 'Intelligent Tutoring',
											'html' => 'AI provides real-time suggestions to learn while simulating.',
											'class' => 'col-md-33perc pr-md-5'
										],
									],


								],
							],

						],
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'simulation models...',
								'href' => '#simulation-models',
							],

						],

					],////WIDGETS
				],


			],
		],



	],
];
$section7 = [
	'id' => 'simulation-models-coming-soon',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	//	'container_class' => 'd-flex flex-column justify-content-center min-vh-100',
	'rows' => [
		[
			'class' => 'py-5',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12',
					//					'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'MainTitle',
							'props' => [
								'html' => 'coming soon...',
							],
						],
						[
							'component' => 'TeaserList4',
							'props' => [

								'items' => [
									[
										'props' => [
											'title' => 'C-172',
											'class' => 'col-md-20perc'
										],
									],
									[
										'props' => [
											'title' => 'pa-28',
											'class' => 'col-md-20perc'
										],
									],
									[
										'props' => [
											'title' => 'DA-20',
											'class' => 'col-md-20perc'
										],
									],
									[
										'props' => [
											'title' => 'DA-40',
											'class' => 'col-md-20perc'
										],
									],
									[
										'props' => [
											'title' => 'DA-42',
											'class' => 'col-md-20perc'
										],
									],

								],
							],

						],
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'our new lightweight ITD...',
								'href' => '#eitd',
							],

						],

					],////WIDGETS
				],


			],
		],



	],
];
$page     = [
	"sections" => [
		$section1,
		$section2,
		$section3,
		$section4,
		$section5,
		$section7
	],
	'meta' => [
		'title' => 'Mission XR',
		'description' => 'meta description of iPerformX MissionXR',
	],
];