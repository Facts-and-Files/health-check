<?php

class Health {

	public function __construct() { }

	public function render(): string
	{
		$html = <<<HTML
<!doctype html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Transcribathon Health Status</title>
	<link rel="shortcut icon" href="/favicon.png" />
	<link rel="stylesheet" href="/assets/css/style.min.css?v=20231102" />
	<script src="/assets/js/alpinejs.3.13.2.min.js" defer></script>
</head>
<body
	class="
		text-sm
		font-sans
		subpixel-antialiased
		leading-normal
		overflow-y-scroll
		p-8
	"
	x-data="{
		data: [
			{
				title: 'Website',
				description: 'al lad lasdj',
				status: 'Failed'
			},
			{
				title: 'API v1',
				description: 'al lad lasdj',
				status: 'Slow'
			},
			{
				title: 'API v2',
				description: 'al lad lasdj',
				status: 'Ok'
			},
			{
				title: 'Database',
				description: 'al lad lasdj',
				status: 'Ok'
			},
			{
				title: 'Network',
				description: 'al lad lasdj',
				status: 'Very Slow'
			}
		]
	}"
	x-init="
		const website = await fetch('url');
		data[0].status = website.status === 200 ? 'Ok' : 'Failed';
		console.log(website);
	"
>
	<div class="
		w-full
		mx-auto
		max-w-md
		p-4
		bg-white
		border
		border-gray-200
		rounded-lg
		shadow
		sm:p-8
	">
		<h1 class="
			mb-8
			text-center
			text-xl
			font-bold
			leading-none
			text-gray-900
		">Transcribathon Health Checks</h1>
		<div class="flow-root">
			<ul class="divide-y divide-gray-200">
				<template x-for="service in data" :key="index">
					<li class="py-3 sm:py-4">
						<div class="flex items-center space-x-4">
							<div class="flex-1 min-w-0">
								<p
									class="text-sm font-medium text-gray-900"
									x-text="service.title"
								></p>
								<p
									class="text-sm text-gray-500 truncate"
									x-text="service.description"
								>
								</p>
							</div>
            	<div
								class="
									inline-flex
									items-center
									text-xs
									font-medium
									mr-2
									px-2.5
									py-0.5
									rounded-full
								"
								:class="
									service.status === 'Ok'
										? 'bg-green-100 text-green-800'
										: (service.status === 'Slow'
											? 'bg-orange-100 text-orange-800'
											: 'bg-red-100 text-red-800')
									"
							>
                <span class="
										w-2
										h-2
										mr-1
										rounded-full
									"
								:class="
									service.status === 'Ok'
										? 'bg-green-500'
										: (service.status === 'Slow'
											? 'bg-orange-500'
											: 'bg-red-500')
									"
								></span>
								<span x-text="service.status"></span>
            	</div>
						</div>
					</li>
				</template>
			</ul>
		</div>
	</div>
</body>
</html>
HTML;

		return $html;
	}
}

$health = new Health();
echo $health->render();
