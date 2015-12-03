;(function($) {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // $("#categories-list").on("mouseover", "figure", function(e) {
  // $(this).find("img").attr("src", $(this).find("img").attr("src").match(/(.*)\.png/)[1] + "_hover.png");
  //   if () {
  //
  //   }
  //   $(this).find("figcaption").css("color", "#FA4F3A");
  // });
  // $("#categories-list").on("mouseout", "figure", function(e) {
  //   $(this).find("img").attr("src", $(this).find("img").attr("src").match(/(.*)\_/)[1] + ".png");
  // });

  var $sections = $("section"),
    $navLinks = $(".nav-item-link"),
    $nav = $("nav"),
    $htmlAndBody = $("html, body");
  $window = $(window);

  $navLinks.on("click", function() {
    var $self = $(this);
    var sectionId = $self.data("section-id");

    $htmlAndBody.animate({
      scrollTop: $("#" + sectionId).offset().top - 50
    }, 300, function() {
      $navLinks.removeClass("active");
      $self.addClass("active");
    });
  });

  $window.on("unload", function() {
    window.scrollTo(0, 0);
  });

  // $("nav").autoHidingNavbar({
  //   showOnBottom: true,
  //   hideOffset: 0
  // });
  // $("nav").hide();




  $("#discover-button").on("click", function(e) {
    $htmlAndBody.animate({
      scrollTop: $("#content").offset().top
    }, 600);
  });

  // var n = false;
  // $window.on('mousewheel scroll', function() {
  //   if ($window.scrollTop() >= $window.height() && !n) {
  //     $("nav").css({
  //       "position": "fixed",
  //       "top": "0",
  //       "left": "0"
  //     });
  //     $("#content").css("padding-top", "60px");
  //     n = true;
  //   } else if ($window.scrollTop() < $window.height() && n) {
  //     $("nav").css("position", "static");
  //     $("#content").css("padding-top", "0");
  //     n = false;
  //   }
  // });


  $("nav").autoHidingNavbar({
    showOnBottom: true,
    hideOffset: $window.height() + 1
  });
  // var n = false;
  // $window.on('mousewheel scroll', function() {
  // if ($window.scrollTop() >= $window.height() + 60) {
  //   $("nav").autoHidingNavbar('show');

  //   console.log("bottom");
  //   n = true;
  // } else if ($window.scrollTop() < $window.height() + 60) {
  //   $("nav").autoHidingNavbar('hide');
  //   n = false;
  //     console.log("top");
  //
  //   }
  // });
  // $window.on('mousewheel scroll', function() {
  //   var aboveBlocks = $sections.map(function(i, section) {
  //     if (section.getBoundingClientRect().top <= 50) {
  //       return section;
  //     }
  //   });
  //   $navLinks.removeClass("active");
  //   $($navLinks[aboveBlocks.length - 1]).addClass("active");
  //
  //   if ($window.scrollTop() >= $window.height() - 50) {
  //     $nav.css({
  //       "height": "50px",
  //       "background-color": "rgba(24, 40, 72, 1)"
  //     });
  //   } else {
  //     $nav.css({
  //       "height": ($window.height() - $window.scrollTop()) + "px",
  //       "background-color": "rgba(24, 40, 72, " + $window.scrollTop() / $window.height() + ")"
  //     });
  //   }
  // });

  $("#contact-form").on("submit", function(e) {
    e.preventDefault();
    var $self = $(this);

    $.ajax({
      url: "/contact",
      type: 'post',
      data: $self.serialize()
    }).done(function(flashMsg) {
      $self.prepend(flashMsg);
    }).fail(function() {
      alert('Posts could not be loaded.');
    });
  });

  // $("#welcome").fadeIn(1300, function () {
  //     $(this).animate({"opacity": "0.0"}, 1000, function() {
  //         $("body").css("overflow", "auto");
  //     });
  //     $navLinks.fadeIn(1000);

  // $htmlAndBody.animate({
  //     scrollTop: $("#about-section").offset().top - 50
  // }, 1000, function() {

  // });
  // });

  $navLinks.each(function(i, link) {
    setTimeout(function() {
      $(link).fadeIn(300);
    }, i * 300);
  });

  // search box handler

  function searchPosts(e) {
    searchPostsQuery = $('#search-posts-input').val();
    categoryId = "none";
    getItems('post', '1', true);
  }

  function searchQuestions(e) {
    searchQuestionsQuery = $('#search-questions-input').val();
    categoryId = "none";
    getItems('question', '1', true);
  }

  var searchPostsQuery = '';
  var searchQuestionsQuery = '';
  $('#search-posts-button').on('click', searchPosts);
  $('#search-questions-button').on('click', searchQuestions);

  function changeCategoryHandler(e) {
    e.preventDefault();

    categoryId = $(this).attr("id");

    $.ajax({
      'url': $(this).attr("href")
    }).done(function(items) {
      if (/\S/.test(items)) {
        $('#posts-block').html(items);
        $('.items-list').on('click', 'a.clickable', showItem);
        $htmlAndBody.animate({
          scrollTop: $("#posts-block").offset().top - 50
        }, 300);
      } else {
        $('#posts-block').append("No posts in this category.");
      }
    }).fail(function() {
      alert('Posts could not be loaded.');
    });
  }

  var categoryId = "none";
  $("#categories-list").on('click', 'a', changeCategoryHandler);

  // ajax posts

  function changePage(e) {
    e.preventDefault();

    var pageNumber = $(this).attr('href').split('page=')[1];

    var resource = "";

    if ($(this).parents().is("#comments-block") > 0) {
      resource = 'comment';
    } else if ($(this).parents().is("#answers-block") > 0) {
      resource = 'answer';
    } else if ($(this).parents().is("#posts-block") > 0) {
      resource = 'post';
    } else {
      resource = 'question';
    }
    getItems(resource, pageNumber);
  }

  function showItem(e) {
    e.preventDefault();
    var resource = "";

    if ($(this).parents().is("#posts-block") > 0) {
      resource = 'post';
    } else {
      resource = 'question';
    }
    getItem(resource, $(this).attr('href'));
  }

  $('#posts-block, #questions-block').on('click', '.pagination a', changePage);
  $('.items-list').on('click', 'a.clickable', showItem);

  function addResetSearchLink(resource) {
    $('#' + resource + 's-block').html("<a id='reset-" + resource + "s-search' href='/" + resource + "s'>Reset search</a>");
    $('#reset-' + resource + 's-search').on('click', function(e) {
      e.preventDefault();
      getItems(resource, '1');
    });
  }

  function getItems(resource, page, isSearchRequest) {
    var url = '';
    if (isSearchRequest && resource === 'post' && searchPostsQuery !== '') {
      url = 'search/' + resource + '/' + searchPostsQuery + '?page=' + page;
      addResetSearchLink('post');
    } else if (isSearchRequest && resource === 'question' && searchQuestionsQuery !== '') {
      url = 'search/' + resource + '/' + searchQuestionsQuery + '?page=' + page;
      addResetSearchLink('question');
    } else {
      var parentResourceId = '';
      if (resource === 'comment') {
        parentResourceId = $("article").attr("id");
      } else if (resource === 'answer') {
        parentResourceId = $(".question").attr("id");
      }

      if (resource === 'post' && categoryId !== 'none') {
        url = 'category/' + categoryId + '/posts/?page=' + page;
      } else {
        url = resource + 's/' + parentResourceId + '?page=' + page;
      }
    }
    $('#' + resource + '-block').slideUp(300);

    $.ajax({
      'url': url
    }).done(function(items) {
      if (/\S/.test(items)) {
        $('#' + resource + 's-block').html(items);
        var parentResource = '';
        if (resource !== 'comment' && resource !== 'answer') {
          $('#' + resource + 's-block .items-list').on('click', 'a.clickable', showItem);
        }
        $('#' + resource + 's-block .pagination a').on('click', changePage);
        $htmlAndBody.animate({
          scrollTop: $("#" + resource + "s-block").offset().top - 50
        }, 300);
      } else {
        $('#' + resource + 's-block').append("<br>Nothing has been found.");
      }
    }).fail(function() {
      alert(resource + 's could not be loaded.');
    });
  }

  function getItem(resource, url) {
    $.ajax({
      'url': url,
    }).done(function(item) {
      $('#' + resource + '-block').html(item).slideDown(300);
      var childResource = '';
      $('#' + resource + '-block .pagination a').on('click', changePage);
      $htmlAndBody.animate({
        scrollTop: $("#" + resource + "-block").offset().top - 74
      }, 300);
    }).fail(function() {
      alert(resource + ' could not be loaded.');
    });
  }

  function showCreatePostForm() {
    $.ajax({
      'url': url,
    }).done(function(createPostForm) {
      $("#post-area").html(createPostForm).slideDown(300);
      $htmlAndBody.animate({
        scrollTop: $("#post-area").offset().top - 74
      }, 300);
    }).fail(function() {
      alert('Post could not be loaded.');
    });
  }

  $("#create-post-button").on("click", function() {
    showCreatePostForm();
  });

})(jQuery);
