


function parseValue(str) {
    if ('true' === str) return true; else if ('false' === str) return false; else if (!isNaN(str * 1)) return parseFloat(str);
    return str;
} // Convert PascalCase to kebab-case

; jQuery(document).ready(function ($) {
    $(document).foundation();


    $('[data-scrollto]').each(function (index, el) {
        if ($($(el).attr('data-scrollto')).length) {
            $($(el).attr('data-scrollto')).attr('data-offsettop', $($(el).attr('data-scrollto')).offset().top - 80);

        }


    });
    $('[data-scrollto]:not([data-show])').on('click', function (event) {
        event.preventDefault();
        scrollto($(this));
        return false;
    });
    $('[data-scrollto][data-click]').on('click', function (event) {
        event.preventDefault();
        var click = $(this).attr('data-click');
        scrollto($(this), function () {
            $(click).trigger('click');
        });

        return false;
    });
    function scrollto(el, callback) {
        // var el = $(elem);
        var i = $(el.attr('data-scrollto'));



        $("html, body").stop().animate({
            scrollTop: i.attr('data-offsettop')
        }, 900, "swing", function () {

            if (typeof callback == "function") {
                callback(el);
            }
        })
    }


    jQuery('img').filter(function () {
        return this.src.match(/.*\.svg$/);
    }).each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');


        jQuery.get(imgURL, function (data) {

            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');
            // remove possible duplicates id's after putting them inline
            $svg.find('[id]').each(function (index, el) {

                let current_id = jQuery(this).attr('id'),
                    random_id = '_' + (
                        Number(String(Math.random()).slice(2)) +
                        Date.now() +
                        Math.round(performance.now())
                    ).toString(36);


                $svg.find('#' + current_id).prop('id', random_id);
                let svg_html = $svg.html(); // must be after replaceding ID
                svg_html = svg_html.replace('url(#' + current_id + ')', 'url(#' + random_id + ')');

                $svg.html(svg_html);
            });

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });

});
