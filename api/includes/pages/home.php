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
								'html' => 'MissionXR: Where immersive synthetic training meets AI and remote instruction to deliver an efficient learning experience.',
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
											'html' => 'Training <strong>adapts to student performance</strong> and competency benchmarks',
										],
									],
									[
										'props' => [
											'html' => 'Dynamically uncover and <strong>close skill gaps</strong> early, reducing costly retraining',
										],
									],
									[
										'props' => [
											'html' => '<strong>Human-in-the-loop</strong> oversight ensures instructional control, and real-time intervention',
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
												'alt' => 'MissionXR for Instructors',
											],
											'html' => 'Context-Aware Coaching Prompts, Competency-Based Progress Tracking, Skill Gap Detection.',
										],
									],
									[
										'props' => [
											'title' => 'Adaptive, Learner-Focused Training',
											'icon' => [
												'src' => 'icon-cloud_network.png',
												'alt' => 'MissionXR for Students',
											],
											'html' => 'Dynamic Feedback Loops, Trend Monitoring & Alerts, Real-Time Performance Insights.',
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
								'html' => 'Features',
							],
						],

						[
							'component' => 'MainTitle',
							'props' => [
								'html' => 'What MissionXR Can Do',
							],

						],
						[
							'component' => 'TeaserList1',
							'props' => [

								'items' => [
									[
										'props' => [
											'title' => 'Early Intervention and Remediation',
											'html' => 'AI recognizes knowledge gaps in learner interactions and <strong>automates</strong> the delivery of validated generative instructional material.',
											'class' => 'col-md-50perc',
											'image' => [
												'src' => 'students_1.jpg',
												'alt' => 'MissionXR for Students',
											],
										],
									],
									[
										'props' => [
											'title' => 'Dynamic and Effective Learning',
											'html' => 'Through seamless integration with academic courseware, <strong>MissionXR</strong> creates a dynamic, personalized learning journey that inspires self-motivation and mastery. AI-driven learning paths, with instructor oversight, ensure students are supported and challenged appropriately throughout every phase of their education. ',
											'class' => 'col-md-50perc',
											'image' => [
												'src' => 'students_2.jpg',
												'alt' => 'MissionXR for Students',
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
											'html' => 'Accelerate mission readiness and develop winning strategies with intelligent planning across immersive 2D and 3D spaces.',
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
											'html' => 'Step into your mission with intelligent briefings—more complete, more dynamic, and built for better outcomes.',
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
											'html' => 'Build confidence and skill through rich, realistic virtual flight experiences.',
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
											'html' => 'Enrich every debrief with AI-highlighted insights, helping you quickly strengthen skills, recognize achievements, and drive continuous improvement.',
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
								'html' => 'The Virtual Training Environment / Additional Support Tools',
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
											'summary' => 'AI Debrief',
											'title' => 'Better Targeted Remediation',
											'html' => 'AI identifies areas for improvement and suggests next steps for progress.',
											'class' => 'col-md-33perc pr-md-5',
										],
									],
									[
										'props' => [
											'summary' => 'Augment learning',
											'title' => 'WINGMAN<sup>TM</sup><br>Intelligent Tutor',
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
										'html' => 'Discover Training Devices',
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
											'html' => '<strong>MissionXR</strong> delivers advanced simulation training solutions that provide high-fidelity mixed reality experiences, easily adaptable for high-volume operations and remote mission requirements.',
										],
									],
									[
										'props' => [
											'title' => 'Lightweight VR Sled',
											'inner_title' => 'Cutting-Edge Training Devices for Immersive Experiences',
											'html' => 'The <strong>Lightweight VR Sled</strong> features a custom-fabricated seat, HOTAS controls, curved HDTV, and a high-fidelity sound system to deliver a portable and affordable training solution for smaller spaces and budgets.',
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
					'class' => 'col-md-7',
					'widgets' => [],
				],
				[
					'class' => 'col-sm-12 col-md-5',
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
								'title' => 'Get MissionXR<br>Buy now!',
								'html' => 'click here to get an estimate',
								'href' => 'https://www.iperformx.com',
							],

						],
					],
				],
			],
		],
		[
			'class' => 'align-items-center pt-5 py-md-5',

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
					'class' => 'offset-sm-1 col-sm-12 d-md-flex pb-md-5',
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