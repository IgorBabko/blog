<!DOCTYPE html>
<html>
	<head>
		<title>Laravel</title>

		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/app.css">

		<link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

		{{-- @if ( Config::get('app.debug') ) --}}
			{{-- // <script type="text/javascript"> --}}
			{{-- // document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>') --}}
			{{-- // </script>  --}}
		{{-- @endif --}}

	</head>
	<body>
		<span class="glyphicon glyphicon-search search-icon"></span>
		<input type="text" class="form-control search-input" placeholder="search for:">
		<nav>
			<div data-section-id="email" class="email nav-item">
				<span class="glyphicon glyphicon-envelope"></span>
			</div>
			<span data-title="email me">email</span>
			<div data-section-id="ask" class="ask nav-item">
				<span class="glyphicon glyphicon-question-sign"></span>
			</div>
			<span data-title="ask me">ask</span>
			<div data-section-id="posts" class="posts nav-item">
				<span class="glyphicon glyphicon-list-alt"></span></p>
			</div>
			<span data-title="my posts">posts</span>
			<div data-section-id="bio" class="bio nav-item active-item">
				<span class="glyphicon glyphicon-user"></span>
			</div>
			<span data-title="my bio">bio</span>
			<h1>my bio</h1>
		</nav>
		<div class="content">
			{{-- <img id="coffee-img" src="img/coffee.png" alt="coffee">
			<img id="pen-img" src="img/pen1.png" alt="pen"> --}}
			<div class="sections">
				<section id="bio">
					{{-- <div class="avatar-block"> --}}
					<img class="avatar" src="img/me.jpg">
					{{-- </div> --}}
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum repellendus quam nisi sed expedita incidunt ullam minus nihil dolorem amet.</p>
					<p>Eaque veritatis error magnam, temporibus odio aspernatur blanditiis nesciunt nulla non et, vitae cum? Iure, expedita, aut. Eos, consectetur, voluptatem.</p>
					<p>ситуации, как часть более широкого явления. <span class="highlighter">Автор аргументирует</span> и выстраивает свою позицию через систему фактов.
					В статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. <span class="highlighter">Автор аргументирует</span> Также, в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).
					Отличительным аспектом статьи является ее готовность. Если подготавливаемый материал так и не был опубликован <span class="highlighter">Автор аргументирует</span> (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому цель любой статьи является распространение содержащейся в последней информации.</p>
					<p>Lorem ipsum dolor sit amet, consectetur <span class="highlighter">Автор аргументирует</span> adipisicing elit. Sapiente fuga ab culpa impedit, animi iusto dolor odit id cupiditate a amet illo vero. Similique voluptates dolor voluptas, molestias animi repellat non fugiat omnis ipsam iusto nemo tempore dignissimos culpa quod at deserunt, obcaecati nostrum repellendus tempora laborum dolorum? Aliquid optio labore in voluptas, sit fugit possimus accusantium assumenda vel odit. Illum deserunt nisi sequi eos fugiat. Voluptatibus pariatur obcaecati dicta aut, earum neque officia, natus vel reiciendis. Odio hic ullam ad magnam eos deleniti dicta alias, cumque vitae, voluptate distinctio deserunt illum corporis consequuntur earum fuga debitis nesciunt ab voluptatibus, beatae mollitia ratione neque quisquam! Voluptatum quas, ea repudiandae aperiam commodi alias, dolores doloribus distinctio minima autem saepe dolorum possimus in, illo officiis soluta. Earum cumque fugit, ad quo obcaecati. Error saepe laborum, rem mollitia est illo iusto asperiores, sit debitis ipsam ullam, distinctio quos provident commodi veritatis obcaecati quibusdam impedit id, optio alias facilis assumenda eum. Recusandae error, soluta. Consectetur consequatur, iusto voluptatem aperiam, ducimus itaque laboriosam optio tenetur odit iste mollitia unde nemo natus, quas error aut omnis reprehenderit quia aspernatur corporis minus quasi, aliquam praesentium minima. Doloribus repellat suscipit error nemo magni fugit culpa voluptate possimus earum!</p>
				</section>
				<section id="posts">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum repellendus quam nisi sed expedita incidunt ullam minus nihil dolorem amet.</p>
					<p>Eaque veritatis error magnam, temporibus odio aspernatur blanditiis nesciunt nulla non et, vitae cum? Iure, expedita, aut. Eos, consectetur, voluptatem.</p>
					<p>ситуации, как часть более широкого явления. <span class="highlighter">Автор аргументирует</span> и выстраивает свою позицию через систему фактов.
					В статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. <span class="highlighter">Автор аргументирует</span> Также, в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).
					Отличительным аспектом статьи является ее готовность. Если подготавливаемый материал так и не был опубликован <span class="highlighter">Автор аргументирует</span> (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому цель любой статьи является распространение содержащейся в последней информации.</p>
					<p>Lorem ipsum dolor sit amet, consectetur <span class="highlighter">Автор аргументирует</span> adipisicing elit. Sapiente fuga ab culpa impedit, animi iusto dolor odit id cupiditate a amet illo vero. Similique voluptates dolor voluptas, molestias animi repellat non fugiat omnis ipsam iusto nemo tempore dignissimos culpa quod at deserunt, obcaecati nostrum repellendus tempora laborum dolorum? Aliquid optio labore in voluptas, sit fugit possimus accusantium assumenda vel odit. Illum deserunt nisi sequi eos fugiat. Voluptatibus pariatur obcaecati dicta aut, earum neque officia, natus vel reiciendis. Odio hic ullam ad magnam eos deleniti dicta alias, cumque vitae, voluptate distinctio deserunt illum corporis consequuntur earum fuga debitis nesciunt ab voluptatibus, beatae mollitia ratione neque quisquam! Voluptatum quas, ea repudiandae aperiam commodi alias, dolores doloribus distinctio minima autem saepe dolorum possimus in, illo officiis soluta. Earum cumque fugit, ad quo obcaecati. Error saepe laborum, rem mollitia est illo iusto asperiores, sit debitis ipsam ullam, distinctio quos provident commodi veritatis obcaecati quibusdam impedit id, optio alias facilis assumenda eum. Recusandae error, soluta. Consectetur consequatur, iusto voluptatem aperiam, ducimus itaque laboriosam optio tenetur odit iste mollitia unde nemo natus, quas error aut omnis reprehenderit quia aspernatur corporis minus quasi, aliquam praesentium minima. Doloribus repellat suscipit error nemo magni fugit culpa voluptate possimus earum!</p>
				</section>
				<section id="ask">
					<div class="comment-block write-comment-block">
						<div class="avatar-block">
							<img src="/img/avatar_placeholder_pink.png">
							<button class="button write-button">comment</button>
						</div>
						<div class="comment-info">
							<input type="text" class="form-control name-input" placeholder="Your name">
							<textarea class="form-control" placeholder="What do you wanna say?"></textarea>
						</div>
					</div>
					<div class="comment-block">
						<div class="avatar-block">
							<img src="/img/avatar_placeholder_pink.png">
							<button class="button respond-button">respond</button>
						</div>
						<div class="comment-info">
							<div class="name">niko bellic</div>
							<div class="comment">
								Lorem ipsum dolor sit amet, consectetur adipisicing 
							</div>
						</div>
					</div>
					<div class="responses">
						<div class="comment-block response">
							<div class="avatar-block">
								<img src="/img/avatar_placeholder_pink.png">
							</div>
							<div class="comment-info">
								<div class="name">niko bellic</div>
								<div class="comment">
									Lorem ipsum dolor sit amet, consectetur adipisicing 
								</div>
							</div>
						</div>
						<div class="comment-block response">
							<div class="avatar-block">
								<img src="/img/avatar_placeholder_pink.png">
							</div>
							<div class="comment-info">
								<div class="name">niko bellic</div>
								<div class="comment">
									Lorem ipsum dolor sit amet, consectetur adipisicing 
								</div>
							</div>
						</div>
						<div class="comment-block response">
							<div class="avatar-block">
								<img src="/img/avatar_placeholder_pink.png">
							</div>
							<div class="comment-info">
								<div class="name">niko bellic</div>
								<div class="comment">
									Lorem ipsum dolor sit amet, consectetur adipisicing 
								</div>
							</div>
						</div>
					</div>
					<div class="comment-block">
						<div class="avatar-block">
							<img src="/img/avatar_placeholder_pink.png">
							<button class="button respond-button">respond</button>
						</div>
						<div class="comment-info">
							<div class="name">niko bellic</div>
							<div class="comment">
								Lorem ipsum dolor sit amet, consectetur 
							</div>
						</div>
					</div>
					<div class="comment-block">
						<div class="avatar-block">
							<img src="/img/avatar_placeholder_pink.png">
							<button class="button respond-button">respond</button>
						</div>
						<div class="comment-info">
							<div class="name">niko bellic</div>
							<div class="comment">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore voluptatum omnis, eius reprehenderit ullam, nemo numquam asperiores totam minima quidem nesciunt, labore officiis. Aliquam praesentium et velit consequatur officiis provident veniam ea ratione animi quisquam! Saepe fuga incidunt corporis iste autem recusandae, possimus maxime temporibus fugit veniam quis nisi amet neque soluta animi accusamus enim, nostrum quia. Unde illo necessitatibus minima est autem hic optio nam tempore vero voluptate neque explicabo quis ducimus nemo praesentium qui suscipit, expedita ab cumque enim veritatis aspernatur sit quia a ad. Itaque consectetur dolores, deserunt, vero, repudiandae dolor blanditiis reiciendis quod aperiam atque cum! Aspernatur omnis dignissimos provident molestiae labore tenetur ad, quia quod, perferendis amet harum a incidunt quos maxime vitae qui. Velit provident amet sit placeat modi qui exercitationem optio harum non explicabo minima, esse, atque est fugit porro quis voluptate expedita laboriosam. Dolorem unde voluptate ab, necessitatibus accusantium qui asperiores nihil, dolores eum laboriosam a veritatis nemo? Aspernatur, illum, praesentium. Sit, odit aut distinctio voluptatibus commodi, neque ad voluptates, exercitationem eligendi consequuntur ut cupiditate recusandae asperiores accusantium quaerat, eos nam quos laboriosam nihil fugit aspernatur doloribus. Eius laudantium sequi corrupti perferendis officia dignissimos, explicabo, consequatur animi. Eveniet porro minus dolores at.
							</div>
						</div>
					</div>
					<div class="comment-block">
						<div class="avatar-block">
							<img src="/img/avatar_placeholder_pink.png">
							<button class="button respond-button">respond</button>
						</div>
						<div class="comment-info">
							<div class="name">niko bellic</div>
							<div class="comment">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, at tempore unde aliquid culpa aspernatur excepturi quas architecto! Non ipsam nisi, maxime ipsa, mollitia dolores omnis earum dicta incidunt eligendi, quas totam porro maiores! Assumenda tempore saepe laudantium ea ipsa recusandae, nemo voluptates ex culpa cupiditate, itaque, incidunt non deserunt?
							</div>
						</div>
					</div>
				</section>
				<section id="email">
					<form>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Name:</label>
									<input type="text" class="form-control" id="exampleInputEmail1">
								</div>
								<div class="form-group password-group">
									<label for="exampleInputPassword1">Email:</label>
									<input type="email" class="form-control" id="exampleInputPassword1">
								</div>
							</div>
							<div class="form-group col-md-6">
								<label>Text:</label>
								<textarea class="form-control"></textarea>
							</div>
						</div>
						<button type="submit" class="submit-email button">Submit</button>
					</form>
				</section>
			</div>
		</div>

		<script src="js/jquery-2.1.4.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>