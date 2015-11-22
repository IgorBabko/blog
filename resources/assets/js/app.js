;(function($) {

    var $sections    = $("section"),
        $navLinks    = $(".nav-item-link"),
        $nav         = $("nav"),
        $htmlAndBody = $("html, body");
        $window      = $(window);

    $navLinks.on("click", function() {
        var $self = $(this);
        var sectionId = $self.data("section-id");

        $htmlAndBody.animate({
            scrollTop: $("#" + sectionId).offset().top - 50
        }, 600, function() {
            $navLinks.removeClass("active");
            $self.addClass("active");
        });
    });

    $window.on("unload", function() {
        window.scrollTo(0, 0);
    });

    $window.on('mousewheel scroll', function() {
        var aboveBlocks = $sections.map(function(i, section) {
            if(section.getBoundingClientRect().top <= 50) {
                return section;
            }
        });
        $navLinks.removeClass("active");
        $($navLinks[aboveBlocks.length - 1]).addClass("active");

        if ($window.scrollTop() >= $window.height() - 50) {
            $nav.css({"height": "50px", "background-color": "rgba(107, 78, 77, 1)"});
        } else {
            $nav.css({"height": ($window.height() - $window.scrollTop()) + "px", "background-color": "rgba(107, 78, 77, " + $window.scrollTop() / $window.height() + ")" });
        }
    });

    // $("#welcome").fadeIn(1500, function () {
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

    var searchPostQuery = '';
    var searchQuestionQuery = '';
    $('#search-posts-button').on('click', search);
    function searchPost(e) {
        searchPostQuery = $('#search-post-input').val();
        getItems('post');
    }
    $('#search-questions-button').on('click', search);
    function searchQuestion(e) {
        searchQuestionQuery = $('#search-questions-input').val();
        getItems('question');
    }

    // ajax posts

    function changePage(e) {
        e.preventDefault();
        console.log('niko');

        var pageNumber = $(this).attr('href').split('page=')[1];

        var resource = "";

        if ($(this).parents().is("#comments-block") > 0) {
            resource = 'comment';
        } else if($(this).parents().is("#answers-block") > 0) {
            resource = 'answer';
        } else if($(this).parents().is("#posts-block") > 0) {
            resource = 'post';
            $('#'+resource+'-block').slideUp(300);
        } else {
            resource = 'question';
            $('#'+resource+'-block').slideUp(300);
        }

        if (searhcQuery) {

        } else {
            getItems(resource, pageNumber);
        }
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


    function getItems(resource, page) {
        var url = '';
        if (searchPostQuery !== '') {
            url = 'search/'+resource+'/'+searchQuery+'?page='+page;
        } else {
            url = resource+'s/'+parentResourceId+'?page='+page;
        }

        var parentResourceId = '';
        if (resource === 'comment') {
            parentResourceId = $("article").attr("id");
        } else if (resource === 'answer') {
            parentResourceId = $(".question").attr("id");
        }

        $.ajax({
            'url': url
        }).done(function (items) {
            $('#'+resource+'s-block').html(items);
            // $('#'+resource+'s-block').on('click', '.pagination a', changePage);
            if (resource !== 'comment' && resource !== 'answer') {
                $('.items-list').on('click', 'a.clickable', showItem);
            }
            $htmlAndBody.animate({ scrollTop: $("#"+resource+"s-block").offset().top - 50}, 500);
        }).fail(function () {
            alert(resource + 's could not be loaded.');
        });
    }

    function getItem(resource, url) {
        $.ajax({
            'url': url,
        }).done(function (item) {
            $('#'+resource+'-block').html(item).slideDown(300);
            var childResource = '';
            if (resource === 'post') {
                childResource = 'comments';
            } else {
                childResource = 'answers';
            }
            $('#'+childResource+'-block').on('click', '.pagination a', changePage);
            $htmlAndBody.animate({ scrollTop: $("#"+resource+"-block").offset().top - 74}, 300);
        }).fail(function () {
            alert(resource+' could not be loaded.');
        });
    }

    function showCreatePostForm() {
        $.ajax({
            'url': url,
        }).done(function (createPostForm) {
            $("#post-area").html(createPostForm).slideDown(300);
            $htmlAndBody.animate({ scrollTop: $("#post-area").offset().top - 74}, 300);
        }).fail(function () {
            alert('Post could not be loaded.');
        });
    }

    $("#create-post-button").on("click", function() {
        showCreatePostForm();
    });

})(jQuery);
