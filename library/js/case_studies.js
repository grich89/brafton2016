jQuery(document).ready(function($) {
    //wrapping 2 articles in each li, to be reused in AJAX calls
    function group_articles() {
        var $set = $('#carousel-ul').children();
        for (var i = 0, len = $set.length; i < len; i += 2) {
            $set.slice(i, i + 2).wrapAll('<li></li>');
        }
    }

    group_articles();

    //then, run jcarousel
    $('.jcarousel').jcarousel({
        wrap: 'circular'
    });
    $('.jcarousel-prev').jcarouselControl({
        target: '-=1'
    });
    $('.jcarousel-next').jcarouselControl({
        target: '+=1'
    });
   
    //hide all hover images
    $(".hover_image_link").hide();
    
    //mouseenter and leave effects
    $(function() {
        $(document).on("mouseenter", ".featured_image_link", function() {
            $(this).hide();
            $(this).next().fadeIn(300);
        });
        $(document).on("mouseleave", ".hover_image_link", function() {
            $(this).hide();
            $(this).prev().show();
        });
    });
    

    //
    //AJAX calls for filters, jcarousel reloaded on success
    //
    $(document).on('change', '#sel-ind,#sel-prod,#sel-size', function() {
        industry = $('#sel-ind').children(":selected").text();
        indid = $('#sel-ind').children(":selected").val();
        prodid = $('#sel-prod').children(":selected").val();
        sizeid = $('#sel-size').children(":selected").val();
        indname = $('#sel-ind').children(":selected").attr("id");
        prodname = $('#sel-prod').children(":selected").attr("id");
        sizename = $('#sel-size').children(":selected").attr("id");
        console.log(sizeid);
        $.ajax({
            url: 'http://www.brafton.com/wp-admin/admin-ajax.php',
            data: {
                'id': indid,
                'prodid': prodid,
                'sizeid': sizeid,
                'action': 'do_ajax',
                'industry': industry,
                'client-size': 'client-size'
            },
            dataType: 'JSON', // I find JSON to be most versatile
            beforeSend: function() {
                $('#carousel-ul').html('<p>Loading...</p>');
            },
            success: function(data) {
                $('#carousel-ul').html('');
                if (data) {
                    for (i = 0; i < data.length; i++) {
                        $('#carousel-ul').append(data[i]);
                        //endloop
                    }
                    group_articles();
                    //end null test
                }
                $(".hover_image_link").hide();
                //reload dat jcarousel 
                $('.jcarousel').jcarousel({});
                //end success
            },
            error: function(errorThrown) {
                alert(indid + ' ' + prodid);
                console.log(errorThrown);
            }
        });
        // or $(this).val();
    });
   


   $(document).on('click', '.viewall', function() {
        $('#sel-ind').val('');
        $('#sel-prod').val('');
        $('#sel-size').val('');
        $.ajax({
            url: 'http://www.brafton.com/wp-admin/admin-ajax.php',
            data: {
                'action': 'do_ajax',
                'industry': 'all',
                'client-size': 'all'
            },
            //end ajax 
            dataType: 'JSON', // I find JSON to be most versatile
            beforeSend: function() {
                $('#carousel-ul').html('<p>Loading...</p>');
            },
            success: function(data) {
                $('#carousel-ul').html('');
                if (data) {
                    for (i = 0; i < data.length; i++) {
                        $('#carousel-ul').append(data[i]);
                        //endloop
                    }
                    group_articles();
                    //end null test
                }
                $(".hover_image_link").hide();
                //reload dat jcarousel 
                $('.jcarousel').jcarousel({});
                //end success
            }
            //end ajax
        });
    });
    //end document ready
});