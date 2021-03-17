<!DOCTYPE HTML>
<html>

<head>
	<title>Meme Stock</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

	<link rel="icon" href="./favicon.ico" sizes="64x64">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js" defer></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-NMB7B5F');
	</script>
	<!-- End Google Tag Manager -->

	<script>
		$(document).ready(function() {
			$('#stonks').DataTable({
				"processing": true,
				"searching": false,
				"lengthChange": false,
				"order": [
					[1, "desc"]
				],
				"info": false,
				"pageLength": 10,
				"pagingType": "numbers",
				"ajax": {
					"url": "https://wsb-pop-index.s3.amazonaws.com/wsbPopIndex.json",
					"dataSrc": function(data) {
						var returnData = data.data.slice(0, 20);

						returnData.forEach(callbackFunction);

						function callbackFunction(item, index, arr) {
							//Initialize data
							var tweetData = 0;
							arr[index].push(tweetData);
						}
						return returnData;
					}
				},
				"fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
					var countMention = 0;
					$('td:eq(2)', nRow).html('<i class="fas fa-circle-notch fa-spin"></i>')
					$.post("ajax_get_count_stock.php", {
							stock_keyword: aData[0]
						})
						.done(function(data) {
							countMention = parseInt(data);
							$('td:eq(2)', nRow).html(countMention);
						});
				}
			});

			$.getJSON('https://wsb-pop-index.s3.amazonaws.com/wsbPopIndex.json', function(data) {
				$("#posts").html("20");
				$("#comments").html(data.comments);
				$("#time").text(data.time.substring(0, 19) + ' EST');
			});

			$('.dataTable').on('click', 'tbody td', function() {
				//get textContent of the TD
				console.log('TD cell textContent : ', this.textContent)

				//If ticker symbol, link to Yahoo Finance
				if (/^[a-zA-Z]+$/.test(this.textContent)) {
					window.open("https://finance.yahoo.com/quote/" + this.textContent);
				}
				//If mention count, link to reddit
				if (/^[/\d+/g]+$/.test(this.textContent)) {
					var ticker = $(this).prevAll().text();
					window.open("https://old.reddit.com/r/wallstreetbets/search/?q=" + ticker + "&include_over_18=on&restrict_sr=on&t=all&sort=new");
				}
				//If mention count, Link to twiiter
				if (/^[/\d+/g]+$/.test(this.textContent)) {
					var ticker = $(this).prevAll().text();
					window.open("https://old.twiiter.com/r/wallstreetbets/search/?q=" + ticker + "&include_over_18=on&restrict_sr=on&t=all&sort=new");
				}
			})

		});
	</script>


</head>

<body class="homepage is-preload">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMB7B5F" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="page-wrapper">

		<!-- Header -->
		<div class="for-full-back " id="main-sec">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-8 col-md-offset-2 ">
						<h1 class="pad-adjust"><img src="./assets/img/logo.png" width="500px" height="400px"></h1>
					</div>
				</div>
			</div>
		</div>

		<!-- Intro  style="background-color:rgba(38, 82, 131, 0.7 ) -->
		<section id="intro" class="wrapper style1">
			<div class="container">
				<div class="row" align="center" style="width:100%">
					<div class="alert alert-success" align="center">
						<span>Use our tracker to find the most discussed stocks from the last 24 hours. This data is updated each hour directly from /r/wallstreetbets (Memed) and mentions on Twitter (Tweeted).</span>
					</div>
					<div>
						<table id="stonks" style="font-size: 1.6em; width: 65%; color:black">
							<thead>
								<tr>
									<th style="font-size: 32px; border-bottom: none;">Stock</th>
									<th style="font-size: 32px; border-bottom: none;">Memed</th>
									<th style="font-size: 32px; border-bottom: none;">Tweeted</th>
								</tr>
							</thead>
							<tbody align="center">
							</tbody>
						</table>
					</div>
		</section>


		<!-- Footer -->
		<footer class="row" align="center" style="width:100%">
			<div class="alert alert-warning" align="center">
				<span><b>DISCLAIMER!</b> This information is not investing advise. We are not financial advisers and you can lose all your money. Do your own research. DO NOT trust /r/wallstreetbets and or Twitter as valid research. Use this at your own risk. Using this data for investing purposes concedes that you are intellectually deficit as no one should be using memes and or tweets for investment advice.
			</div>

			<div class="alert alert-success1" align="center" style="margin-left:auto; margin-right:auto; font-size:18px">
				<span><span >Was this useful? Please help improve the website by donating!</span>
					<br><br><b><span> Donate Bitcoin</span></b>  <br> <b><img src="./assets/img/IMG_6098.png" width="25px" height="25px" style="vertical-align:bottom"> BTC Wallet:</b> <span class="code">19QekhxqKmoKzMTqk5WiKEf5eTwvXZ3Fv6</span></span></span>
				<br><br>
				<img src="./assets/img/Qrcode.png" width="250px" height="250px">
			</div>
			<div class="for-full-back color-bg-one" id="footer" width="100%">
				2021 | All Right Reserved <span>| Contact Us: buymemestock@gmail.com</span>
			</div>
		</footer>
		<!-- END FOOTER SECTION -->

		<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
		<!-- CORE JQUERY  -->

	</div>

	<!-- Scripts -->
	<script src="assets/plugins/jquery-1.10.2.js"></script>
	<script src="assets/plugins/bootstrap.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.dropotron/1.4.3/jquery.dropotron.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--<script src="assets/js/main.js"></script>-->
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
</body>

</html>