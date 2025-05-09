<?php

$section1 = [
	'id' => 'welcome',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'menu_label' => 'Welcome',
	'bg' => [
		'mobile' => 'section-1-bg-mobile.jpg',
		//		'tablet' => 'bg-tablet-01.jpg',
		'desktop' => 'section-1-bg-desktop.jpg',
	],
	'rows' => [
		[
			'class' => 'align-items-end min-vh-100',
			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12 col-md-7',
					'wrapper_class' => 'entry pb-footer',
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
	'menu_label' => 'Uniqueness',
	'bg' => [
		'mobile' => 'section-2-bg-mobile.jpg',
		//		'tablet' => 'bg-tablet-01.jpg',
		'desktop' => 'section-2-bg-desktop.jpg',
	],
	'rows' => [
		[
			'class' => 'align-items-center min-vh-100',
			'columns' => [
				[
					'class' => 'offset-md-1 col-sm-12 col-md-5  order-2 order-md-1',
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
				[
					'class' => 'col-sm-12 col-md-6 order-1 order-md-2',
					//'wrapper_class' => 'entry',
					'widgets' => [
						[
							'component' => 'Panels1',
							'props' => [
								'items' => [
									[
										'props' => [
											'title' => 'Empowering Instructors with AI',
											'icon' => [
												'src' => 'icon-ip.png',
												'alt' => 'MXR for Instructors',
											],
											'html' => 'Decision-Making Support, Focused Interventions, Optimized Workflow.',
										],
									],
									[
										'props' => [
											'title' => 'Student-Centered Learning',
											'icon' => [
												'src' => 'icon-cloud_network.png',
												'alt' => 'MXR for Students',
											],
											'html' => 'Summary & Alerts, Decision Support, Personalized Learning Suggestions.',
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

$section3 = [
	'id' => 'features',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'menu_label' => 'Features',
	'bg' => [
		//		'mobile' => 'bg-mobile-01.jpg',
		//		'tablet' => 'bg-tablet-01.jpg',
		'desktop' => 'section-3-bg-desktop.jpg',
	],
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
											'class' => 'col-md-50perc',
											'image' => [
												'src' => 'students_1.jpg',
												'alt' => 'MXR for Students',
											],
										],
									],
									[
										'props' => [
											'title' => 'Dynamic and Effective Learning',
											'html' => 'Smart multimedia tools, always accessible to all students, create a comprehensive and personalized educational journey, 
											fostering a strong motivation for self-learning.
											AI-generated learning paths, supervised by Instructors, provide guidance to each student at every stage of their training experience.',
											'class' => 'col-md-50perc',
											'image' => [
												'src' => 'students_2.jpg',
												'alt' => 'MXR for Students',
											],
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
	'menu_label' => 'VTE',
	'bg' => [
		//		'mobile' => 'bg-mobile-01.jpg',
		//		'tablet' => 'bg-tablet-01.jpg',
		'desktop' => 'section-4-bg-desktop.jpg',
	],
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
											'icon' => [
												'src' => 'icon-network.png',
												'alt' => 'PLAN',
											],
										],
									],
									[
										'props' => [
											'title' => 'BRIEF',
											'summary' => 'Interactive Mission Briefing',
											'html' => 'AI-generated mission briefs that are clear, engaging, and interactive.',
											'icon' => [
												'src' => 'icon-virtual-classroom.png',
												'alt' => 'BRIEF',
											],
										],
									],
									[
										'props' => [
											'title' => 'FLY',
											'summary' => 'Immersive Flight Simulations',
											'html' => 'Experience ultra-realistic scenarios in high-fidelity virtual simulators.',
											'icon' => [
												'src' => 'icon-virtual_reality.png',
												'alt' => 'FLY',
											],
										],
									],
									[
										'props' => [
											'title' => 'DEBRIEF',
											'summary' => 'AI-Powered Debriefing',
											'html' => 'Review key mission events with AI-tagged highlights for faster, smarter debriefs.',
											'icon' => [
												'src' => 'icon-biometrics.png',
												'alt' => 'DEBRIEF',
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
		[
			'class' => 'align-items-center min-vh-100 bg-blur',
			'bg' => [
				//		'mobile' => 'bg-mobile-01.jpg',
				//		'tablet' => 'bg-tablet-01.jpg',
				'desktop' => 'section-3-bg-desktop.jpg',
			],
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
											'class' => 'col-md-33perc pr-md-5',
										],
									],
									[
										'props' => [
											'summary' => 'Better preparation',
											'title' => 'Targeted<br>Remediation',
											'html' => 'AI identifies areas for improvement and suggests next steps for progress.',
											'class' => 'col-md-33perc pr-md-5',
										],
									],
									[
										'props' => [
											'summary' => 'Augment learning',
											'title' => 'Intelligent<br>Tutoring',
											'html' => 'AI provides real-time suggestions to learn while simulating.',
											'class' => 'col-md-33perc pr-md-5',
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

//$section5 = [
//	'id' => 'vte-2',
//	'container' => 'default',
//	'layout' => 'default',
//	'class' => 'section-standard',
//	'bg' => [
//		//		'mobile' => 'bg-mobile-01.jpg',
//		//		'tablet' => 'bg-tablet-01.jpg',
//		'desktop' => 'section-5-bg-desktop.jpg',
//	],
//	//	'container_class' => 'd-flex flex-column justify-content-center min-vh-100',
//	'rows' => [
//		[
//			'class' => 'align-items-center min-vh-100',
//			'columns' => [
//				[
//					'class' => 'offset-sm-1 col-sm-12',
//					//					'wrapper_class' => 'entry',
//					'widgets' => [
//						[
//							'component' => 'Pretitle',
//							'props' => [
//								'html' => 'The Virtual Training Environment / 2',
//							],
//						],
//						[
//							'component' => 'TeaserList3',
//							'props' => [
//
//								'items' => [
//									[
//										'props' => [
//											'summary' => 'Remote Instruction',
//											'title' => 'Increase learning success',
//											'html' => 'Instructors can guide you live, from anywhere in the world.',
//											'class' => 'col-md-33perc pr-md-5',
//										],
//									],
//									[
//										'props' => [
//											'summary' => 'Better preparation',
//											'title' => 'Targeted<br>Remediation',
//											'html' => 'AI identifies areas for improvement and suggests next steps for progress.',
//											'class' => 'col-md-33perc pr-md-5',
//										],
//									],
//									[
//										'props' => [
//											'summary' => 'Augment learning',
//											'title' => 'Intelligent<br>Tutoring',
//											'html' => 'AI provides real-time suggestions to learn while simulating.',
//											'class' => 'col-md-33perc pr-md-5',
//										],
//									],
//
//
//								],
//							],
//
//						],
//						[
//							'component' => 'Cta',
//							'props' => [
//								'html' => 'simulation models...',
//								'href' => '#simulation-models',
//							],
//
//						],
//
//					],////WIDGETS
//				],
//
//
//			],
//		],
//
//
//	],
//];

$section6 = [
	'id' => 'simulation-models',
	'menu_label' => 'Simulation Models',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'bg' => [
		//		'mobile' => 'bg-mobile-01.jpg',
		//		'tablet' => 'bg-tablet-01.jpg',
		'desktop' => 'section-5-bg-desktop.jpg',
	],
	//	'container_class' => 'd-flex flex-column justify-content-center min-vh-100',
	'rows' => [
		[
			'class' => 'align-items-center min-vh-100',
			'columns' => [
				[
					'class' => 'col-sm-14',
					//					'wrapper_class' => 'entry',
					'widgets' => [

						[
							'component' => 'VerticalTabs1',
							'props' => [
								'pretitle' => [
									'props' => [
										'html' => 'Simulation Models',
									],
								],
								'title' => [
									'props' => [
										'html' => 'Current sim models',
									],
								],
								'items' => [
									[
										'props' => [
											'title' => 'T-6A',
											'image' => '',
										],
									],
									[
										'props' => [
											'title' => 'T-6B',
											'image' => '',
										],
									],
									[
										'props' => [
											'title' => 'T-38C',
											'image' => '',
										],
									],
									[
										'props' => [
											'title' => 'T-45C',
											'image' => '',
										],
									],
									[
										'props' => [
											'title' => 'F-35',
											'image' => '',
										],
									],

								],
							],

						],


					],////WIDGETS
				],


			],
		],
		[
			'class' => 'py-5 bg-blur',
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
											'class' => 'col-md-20perc',
										],
									],
									[
										'props' => [
											'title' => 'pa-28',
											'class' => 'col-md-20perc',
										],
									],
									[
										'props' => [
											'title' => 'DA-20',
											'class' => 'col-md-20perc',
										],
									],
									[
										'props' => [
											'title' => 'DA-40',
											'class' => 'col-md-20perc',
										],
									],
									[
										'props' => [
											'title' => 'DA-42',
											'class' => 'col-md-20perc',
										],
									],

								],
							],

						],
						[
							'component' => 'Cta',
							'props' => [
								'html' => 'our lightweight ITD...',
								'href' => '#eitd',
							],

						],

					],////WIDGETS
				],


			],
		],

	],
];


$section8 = [
	'id' => 'eitd',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'menu_label' => 'EITD',
	'bg' => [
		//		'mobile' => 'bg-mobile-01.jpg',
		//		'tablet' => 'bg-tablet-01.jpg',
		'desktop' => 'section-3-bg-desktop.jpg',
	],
	//	'container_class' => 'd-flex flex-column justify-content-center min-vh-100',
	'rows' => [
		[
			'class' => 'align-items-center min-vh-100',
			'columns' => [
				[
					'class' => 'col-sm-14',
					//					'wrapper_class' => 'entry',
					'widgets' => [

						[
							'component' => 'Accordion1',
							'props' => [
								'pretitle' => [
									'props' => [
										'html' => 'More Than Software',
									],
								],
								'title' => [
									'props' => [
										'html' => 'discover lightwing',
									],
								],
								'cta' => [
									'props' => [
										'html' => 'Want to know more?...',
										'href' => '#contacts',
									],
								],

								'items' => [
									[
										'props' => [
											'title' => 'Enhanced Immersive Training Devices (eITD)',
											'inner_title' => 'Cutting-Edge Training Devices for Immersive Experiences',
											'html' => 'MissionXR offers a range of advanced training devices that deliver high-fidelity simulations and immersive learning. 
											The compact eITDs are designed to provide an efficient and modern training solution for diverse environments.',
										],
									],
									[
										'props' => [
											'title' => 'Lightweight Training Device',
											'inner_title' => 'Compact, High-Performance Training with LightWing',
											'html' => 'The Lightweight eITD, featuring a custom-fabricated seat, HOTAS controls, curved HDTV, and a head-mounted display, delivers a modern training solution. 
											Smaller and cost-effective, LightWing offers an ideal solution for training in limited spaces.',
										],
									],

								],

							],

						],


					],////WIDGETS
				],


			],
		],


	],
];

$section9 = [
	'id' => 'contacts',
	'menu_label' => 'Contacts',
	'container' => 'default',
	'layout' => 'default',
	'class' => 'section-standard',
	'bg' => [
		'mobile' => 'section-7-bg-mobile.jpg',
		//		'tablet' => 'bg-tablet-01.jpg',
		'desktop' => 'section-7-bg-desktop.jpg',
	],
	'container_class' => 'd-flex flex-column justify-content-center min-vh-100',
	'rows' => [
		[
			'class' => 'align-items-end flex-grow-1',
			'columns' => [
				[
					'class' => 'col-sm-7',
					'widgets' => [],
				],
				[
					'class' => 'col-sm-5',
					'wrapper_class' => 'entry pb-1',
					'widgets' => [
						[
							'component' => 'IpxLogo',
							'props' => [
								'html' => 'iPerformX',
							],

						],
						[
							'component' => 'MxrLogo',
							'props' => [
								'html' => 'MissionXr',
							],

						],
						[
							'component' => 'MainButton',
							'props' => [
								'title' => 'Buy MissionXR now!',
								'html' => 'click here to get an extimate',
								'href' => 'https://www.iperformx.com',
							],

						],
					],
				],
			],
		],
		[
			'class' => 'align-items-center py-5',

			'columns' => [
				[
					'class' => 'offset-sm-1 col-sm-12',

					'widgets' => [
						[
							'component' => 'Pretitle',
							'props' => [
								'html' => 'Contact us',
							],
						],
					],
				],
				[
					'class' => 'offset-sm-1 col-sm-12 d-md-flex pb-5',
					'wrapper_class' => 'd-md-flex',
					'widgets' => [
						[
							'component' => 'ContactBlocks',
							'props' => [
								'items' => [
									[
										'props' => [
											'title' => 'HEADQUARTER',
											'html' => '140 Newport Center Drive Suite 150<br>Newport Beach, CA 92660',
										],

									],
									[
										'props' => [
											'title' => 'EMAIL',
											'html' => '<a href="mailto:info@iperformx.com">info@iperformx.com</a>',
										],

									],
									[
										'props' => [
											'title' => 'PHONE',
											'html' => '800.914.7119',
										],

									],
								],

							],
						],
						[
							'component' => 'Disclaimer',
							'props' => [
								'html' => 'iPerformX provides agile enterprise performance data management systems with sustainment plans that meet current and future requirements in the Great Power Competition environment.',
								'img' => [
									'src' => 'AFA_Symbol.png',
									'alt' => 'Air & Space Force Association',
								],
							],
						],
					],
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

		$section6,
		$section8,
		$section9,
	],
	'meta' => [
		'title' => 'Mission XR',
		'description' => 'meta description of iPerformX MissionXR',
	],
];