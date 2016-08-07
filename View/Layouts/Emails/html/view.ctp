<?php
/**
 * PHP 5
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<style>
			html {
				font-family: sans-serif;
				-ms-text-size-adjust: 100%;
				-webkit-text-size-adjust: 100%;
			}

			body {
				margin: 15px;
			}

			article,
			aside,
			details,
			figcaption,
			figure,
			footer,
			header,
			hgroup,
			main,
			nav,
			section,
			summary {
				display: block;
			}

			audio,
			canvas,
			progress,
			video {
				display: inline-block;
				vertical-align: baseline;
			}

			[hidden],
			template {
				display: none;
			}

			a {
				background: transparent;
			}

			a:active,
			a:hover {
				outline: 0;
			}

			abbr[title] {
				border-bottom: 1px dotted;
			}

			b,
			strong {
				font-weight: bold;
			}

			h1 {
				font-size: 2em;
				margin: 0.67em 0;
			}

			mark {
				background: #ff0;
				color: #000;
			}

			small {
				font-size: 80%;
			}

			sub,
			sup {
				font-size: 75%;
				line-height: 0;
				position: relative;
				vertical-align: baseline;
			}

			svg:not(:root) {
				overflow: hidden;
			}

			figure {
				margin: 1em 40px;
			}

			button,
			input,
			optgroup,
			select,
			textarea {
				color: inherit;
				font: inherit;
				margin: 0;
			}

			button {
				overflow: visible;
			}

			button,
			select {
				text-transform: none;
			}

			button,
			html input[type="button"],
			input[type="reset"],
			input[type="submit"] {
				-webkit-appearance: button;
				cursor: pointer;
			}

			button[disabled],
			html input[disabled] {
				cursor: default;
			}

			button::-moz-focus-inner,
			input::-moz-focus-inner {
				border: 0;
				padding: 0;
			}

			fieldset {
				border: 1px solid #c0c0c0;
				margin: 0 2px;
				padding: 0.35em 0.625em 0.75em;
			}

			legend {
				border: 0;
				padding: 0;
			}

			textarea {
				overflow: auto;
			}

			optgroup {
				font-weight: bold;
			}

			table {
				border-collapse: collapse;
				border-spacing: 0;
			}

			td,
			th {
				padding: 0;
			}

			* {
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}

			*:before,
			*:after {
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}

			html {
				font-size: 62.5%;
				-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
			}

			body {
				font-family: Verdana, helvetica, arial, sans-serif;
				font-size: 90%;
				font-size: 12px;
				line-height: 1.428571429;
				color: #333333;
				background-color: #ffffff;
			}

			input,
			button,
			select,
			textarea {
				font-family: inherit;
				font-size: inherit;
				line-height: inherit;
			}

			a {
				color: #428bca;
				text-decoration: none;
			}

			a:hover,
			a:focus {
				color: #2a6496;
				text-decoration: underline;
			}

			a:focus {
				outline: thin dotted;
				outline: 5px auto -webkit-focus-ring-color;
				outline-offset: -2px;
			}

			hr {
				margin-top: 20px;
				margin-bottom: 20px;
				border: 0;
				border-top: 1px solid #eeeeee;
			}

			.sr-only {
				position: absolute;
				width: 1px;
				height: 1px;
				margin: -1px;
				padding: 0;
				overflow: hidden;
				clip: rect(0, 0, 0, 0);
				border: 0;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			.h1,
			.h2,
			.h3,
			.h4,
			.h5,
			.h6 {
				font-family: inherit;
				font-weight: 500;
				line-height: 1.1;
				color: inherit;
			}

			h1 small,
			h2 small,
			h3 small,
			h4 small,
			h5 small,
			h6 small,
			.h1 small,
			.h2 small,
			.h3 small,
			.h4 small,
			.h5 small,
			.h6 small,
			h1 .small,
			h2 .small,
			h3 .small,
			h4 .small,
			h5 .small,
			h6 .small,
			.h1 .small,
			.h2 .small,
			.h3 .small,
			.h4 .small,
			.h5 .small,
			.h6 .small {
				font-weight: normal;
				line-height: 1;
				color: #999999;
			}

			h1,
			.h1,
			h2,
			.h2,
			h3,
			.h3 {
				margin-top: 20px;
				margin-bottom: 10px;
			}

			h1 small,
			.h1 small,
			h2 small,
			.h2 small,
			h3 small,
			.h3 small,
			h1 .small,
			.h1 .small,
			h2 .small,
			.h2 .small,
			h3 .small,
			.h3 .small {
				font-size: 65%;
			}

			h4,
			.h4,
			h5,
			.h5,
			h6,
			.h6 {
				margin-top: 10px;
				margin-bottom: 10px;
			}

			h4 small,
			.h4 small,
			h5 small,
			.h5 small,
			h6 small,
			.h6 small,
			h4 .small,
			.h4 .small,
			h5 .small,
			.h5 .small,
			h6 .small,
			.h6 .small {
				font-size: 75%;
			}

			h1,
			.h1 {
				font-size: 36px;
			}

			h2,
			.h2 {
				font-size: 30px;
			}

			h3,
			.h3 {
				font-size: 24px;
			}

			h4,
			.h4 {
				font-size: 18px;
			}

			h5,
			.h5 {
				font-size: 14px;
			}

			h6,
			.h6 {
				font-size: 12px;
			}

			p {
				margin: 0 0 10px;
			}

			.lead {
				margin-bottom: 20px;
				font-size: 16px;
				font-weight: 200;
				line-height: 1.4;
			}

			@media (min-width: 768px) {
				.lead {
					font-size: 21px;
				}
			}

			small,
			.small {
				font-size: 85%;
			}

			cite {
				font-style: normal;
			}

			.text-left {
				text-align: left;
			}

			.text-right {
				text-align: right;
			}

			.text-center {
				text-align: center;
			}

			.text-justify {
				text-align: justify;
			}

			.text-muted {
				color: #999999;
			}

			.text-primary {
				color: #428bca;
			}

			a.text-primary:hover {
				color: #3071a9;
			}

			.text-success {
				color: #3c763d;
			}

			a.text-success:hover {
				color: #2b542c;
			}

			.text-info {
				color: #31708f;
			}

			a.text-info:hover {
				color: #245269;
			}

			.text-warning {
				color: #8a6d3b;
			}

			a.text-warning:hover {
				color: #66512c;
			}

			.text-danger {
				color: #a94442;
			}

			a.text-danger:hover {
				color: #843534;
			}

			.bg-primary {
				color: #fff;
				background-color: #428bca;
			}

			a.bg-primary:hover {
				background-color: #3071a9;
			}

			.bg-success {
				background-color: #dff0d8;
			}

			a.bg-success:hover {
				background-color: #c1e2b3;
			}

			.bg-info {
				background-color: #d9edf7;
			}

			a.bg-info:hover {
				background-color: #afd9ee;
			}

			.bg-warning {
				background-color: #fcf8e3;
			}

			a.bg-warning:hover {
				background-color: #f7ecb5;
			}

			.bg-danger {
				background-color: #f2dede;
			}

			a.bg-danger:hover {
				background-color: #e4b9b9;
			}

			ul,
			ol {
				margin-top: 0;
				margin-bottom: 10px;
			}

			ul ul,
			ol ul,
			ul ol,
			ol ol {
				margin-bottom: 0;
			}

			.list-unstyled {
				padding-left: 0;
				list-style: none;
			}

			.list-inline {
				padding-left: 0;
				list-style: none;
			}

			.list-inline > li {
				display: inline-block;
				padding-left: 5px;
				padding-right: 5px;
			}

			.list-inline > li:first-child {
				padding-left: 0;
			}

			dl {
				margin-top: 0;
				margin-bottom: 20px;
			}

			dd, dt {
				margin-bottom: 0.5em;
			}

			dt,
			dd {
				line-height: 1.428571429;
			}

			dt {
				font-weight: bold;
			}

			dd {
				margin-left: 0;
			}

			.dl-horizontal dt:after {
				content: ":";
			}

			@media (min-width: 768px) {
				.dl-horizontal dt {
					float: left;
					width: 180px;
					clear: left;
					text-align: right;
					overflow: hidden;
					text-overflow: ellipsis;
					white-space: nowrap;
				}

				.dl-horizontal dd {
					margin-left: 200px;
				}
			}

			.container {
				margin-right: auto;
				margin-left: auto;
				padding-left: 15px;
				padding-right: 15px;
			}

			@media (min-width: 768px) {
				.container {
					width: 750px;
				}
			}

			@media (min-width: 992px) {
				.container {
					width: 970px;
				}
			}

			@media (min-width: 1200px) {
				.container {
					width: 1170px;
				}
			}

			.row {
				margin-left: -15px;
				margin-right: -15px;
			}

			.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
				position: relative;
				min-height: 1px;
				padding-left: 15px;
				padding-right: 15px;
			}

			.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
				float: left;
			}

			.col-xs-12 {
				width: 100%;
			}

			.col-xs-11 {
				width: 91.66666666666666%;
			}

			.col-xs-10 {
				width: 83.33333333333334%;
			}

			.col-xs-9 {
				width: 75%;
			}

			.col-xs-8 {
				width: 66.66666666666666%;
			}

			.col-xs-7 {
				width: 58.333333333333336%;
			}

			.col-xs-6 {
				width: 50%;
			}

			.col-xs-5 {
				width: 41.66666666666667%;
			}

			.col-xs-4 {
				width: 33.33333333333333%;
			}

			.col-xs-3 {
				width: 25%;
			}

			.col-xs-2 {
				width: 16.666666666666664%;
			}

			.col-xs-1 {
				width: 8.333333333333332%;
			}

			@media (min-width: 768px) {
				.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
					float: left;
				}

				.col-sm-12 {
					width: 100%;
				}

				.col-sm-11 {
					width: 91.66666666666666%;
				}

				.col-sm-10 {
					width: 83.33333333333334%;
				}

				.col-sm-9 {
					width: 75%;
				}

				.col-sm-8 {
					width: 66.66666666666666%;
				}

				.col-sm-7 {
					width: 58.333333333333336%;
				}

				.col-sm-6 {
					width: 50%;
				}

				.col-sm-5 {
					width: 41.66666666666667%;
				}

				.col-sm-4 {
					width: 33.33333333333333%;
				}

				.col-sm-3 {
					width: 25%;
				}

				.col-sm-2 {
					width: 16.666666666666664%;
				}

				.col-sm-1 {
					width: 8.333333333333332%;
				}
			}

			@media (min-width: 992px) {
				.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
					float: left;
				}

				.col-md-12 {
					width: 100%;
				}

				.col-md-11 {
					width: 91.66666666666666%;
				}

				.col-md-10 {
					width: 83.33333333333334%;
				}

				.col-md-9 {
					width: 75%;
				}

				.col-md-8 {
					width: 66.66666666666666%;
				}

				.col-md-7 {
					width: 58.333333333333336%;
				}

				.col-md-6 {
					width: 50%;
				}

				.col-md-5 {
					width: 41.66666666666667%;
				}

				.col-md-4 {
					width: 33.33333333333333%;
				}

				.col-md-3 {
					width: 25%;
				}

				.col-md-2 {
					width: 16.666666666666664%;
				}

				.col-md-1 {
					width: 8.333333333333332%;
				}
			}

			.clearfix:before,
			.clearfix:after,
			.container:before,
			.container:after,
			.container-fluid:before,
			.container-fluid:after,
			.row:before,
			.row:after {
				content: " ";
				display: table;
			}

			.clearfix:after,
			.container:after,
			.container-fluid:after,
			.row:after {
				clear: both;
			}

			.page-header {
				padding-bottom: 9px;
				margin: 40px 0 20px;
				border-bottom: 1px solid #eeeeee;
			}

			.page-title {
				border-bottom: 1px solid #eee;
				margin-bottom: 5px;
			}

			.page-title h1,
			.page-title h2,
			.page-title h3,
			.page-title h4,
			.page-title h5,
			.page-title h6 {
				margin-top: 0px;
			}

			dt {
				color: #aaa;
				font-weight: normal;
				font-style: italic;
			}

			time,
			.time {
				font-size: 90%;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<?php echo $this->fetch('content'); ?>
		</div>
	</body>
</html>