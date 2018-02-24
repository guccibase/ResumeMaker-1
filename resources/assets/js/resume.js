(function($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
        $('.navbar-collapse').collapse('hide');
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#sideNav'
    });

})(jQuery); // End of use strict


$(document).ready(function () {

    $('.to_present').prop('checked', false);
    $('.experience_to_div').fadeIn();

    $('.to_present').on('change', function () {
        if(this.checked) {
            $('.experience_to_div').fadeOut();
        }else {
            $('.experience_to_div').fadeIn();
        }
    })

    $('.add-experience-submit').on('click', function () {

        var data = $('#add-experience').find('.modal-body');

        var title = data.find('input[name="experience_title"]').val(),
            company = data.find('input[name="experience_company"]').val(),
            location = data.find('input[name="experience_location"]').val(),
            from_year = data.find('.experience_from_year option:selected').val(),
            from_month = data.find('.experience_from_month option:selected').val(),
            to_year = data.find('.experience_to_year option:selected').val(),
            to_month = data.find('.experience_to_month option:selected').val(),
            to_present = data.find('input[name="experience_to_present"]:checked').length > 0,
            description = data.find('textarea[name="experience_description"]').val();

        var allow = true;

        if (!title) {
            alert('title is required');
            allow = false;
        }

        if (!company && allow) {
            alert('company is required');
            allow = false;
        }

        if (!from_year && allow) {
            alert('from year is required');
            allow = false;
        }

        if (!from_month && allow) {
            alert('from month is required');
            allow = false;
        }

        if (!to_present) {

            if (!to_year && allow) {
                alert('to year is required');
                allow = false;
            }

            if (!to_month && allow) {
                alert('to month is required');
                allow = false;
            }
        }

        if(allow) {

            var res = '';
            res += '<div class="resume-item d-flex flex-column flex-md-row mb-5">';
            res += '<div class="resume-content mr-auto">';
            res += '<h3 class="mb-0">' + title + '</h3>';
            res += '<div class="subheading mb-3">' + company + '</div>';
            if (location)
                res += '<div class="subheading mb-3">' + location + '</div>';
            if (description)
                res += '<p>' + description + '</p>';
            res += '</div>';
            res += '<span class="text-primary">';
            res += from_month + ' ' + from_year + ' - ';
            if (to_present)
                res += 'Present';
            else
                res += to_month + ' ' + to_year;
            res += '</span>';
            res += '</div>';
            res += '</div>';

            res += '<input name="t_experience_title[]" type="hidden" value="' + title + '"/>';
            res += '<input name="t_experience_company[]" type="hidden" value="' + company + '"/>';
            res += '<input name="t_experience_location[]" type="hidden" value="' + location + '"/>';
            res += '<input name="t_experience_from_year[]" type="hidden" value="' + from_year + '"/>';
            res += '<input name="t_experience_from_month[]" type="hidden" value="' + from_month + '"/>';
            res += '<input name="t_experience_to_year[]" type="hidden" value="' + to_year + '"/>';
            res += '<input name="t_experience_to_month[]" type="hidden" value="' + to_month + '"/>';
            res += '<input name="t_experience_to_present[]" type="hidden" value="' + to_present + '"/>';
            res += '<input name="t_experience_description[]" type="hidden" value="' + description + '"/>';


            $('.experiences-list').after(res);

            $('.to_present').prop('checked', false);
            $('.experience_to_div').fadeIn();

            data.find('input[name="experience_title"]').val('');
            data.find('input[name="experience_company"]').val('');
            data.find('input[name="experience_location"]').val('');
            data.find('textarea[name="experience_description"]').val('');
            $('#add-experience').modal('hide');

        }

    });

    $('.add-experience-cancel').on('click', function () {

        $('.to_present').prop('checked', false);
        $('.experience_to_div').fadeIn();

        data.find('input[name="experience_title"]').val('');
        data.find('input[name="experience_company"]').val('');
        data.find('input[name="experience_location"]').val('');
        data.find('textarea[name="experience_description"]').val('');

        $('#add-experience').modal('hide');

    });



    $('.add-education-submit').on('click', function () {

        var data = $('#add-education').find('.modal-body');

        var school = data.find('input[name="education_school"]').val(),
            degree = data.find('input[name="education_degree"]').val(),
            field_of_study = data.find('input[name="education_field_of_study"]').val(),
            grade = data.find('input[name="education_grade"]').val(),
            activities_and_societies = data.find('textarea[name="education_activities_and_societies"]').val(),
            from_year = data.find('.education_from_year option:selected').val(),
            to_year = data.find('.education_to_year option:selected').val(),
            description = data.find('textarea[name="education_description"]').val();

        var allow = true;

        if (!school) {
            alert('school is required');
            allow = false;
        }

        if (!degree && allow) {
            alert('degree is required');
            allow = false;
        }

        if (!from_year && allow) {
            alert('from year is required');
            allow = false;
        }

        if (!to_year && allow) {
            alert('to year is required');
            allow = false;
        }

        if(allow) {

            var res = '';
            res += '<div class="resume-item d-flex flex-column flex-md-row mb-5">';
            res += '<div class="resume-content mr-auto">';
            res += '<h3 class="mb-0">' + school + '</h3>';
            res += '<div class="subheading mb-3">' + degree + '</div>';
            if (field_of_study)
                res += '<div class="subheading mb-3">' + field_of_study + '</div>';
            if (grade)
                res += '<p>' + grade + '</p>';
            if (activities_and_societies)
                res += '<p>' + activities_and_societies + '</p>';
            if (description)
                res += '<p>' + description + '</p>';
            res += '</div>';
            res += '<span class="text-primary">';
            res += from_year + ' - ' + to_year;
            res += '</span>';
            res += '</div>';
            res += '</div>';

            res += '<input name="t_education_school[]" type="hidden" value="' + school + '"/>';
            res += '<input name="t_education_degree[]" type="hidden" value="' + degree + '"/>';
            res += '<input name="t_education_field_of_study[]" type="hidden" value="' + field_of_study + '"/>';
            res += '<input name="t_education_grade[]" type="hidden" value="' + grade + '"/>';
            res += '<input name="t_education_activities_and_societies[]" type="hidden" value="' + activities_and_societies + '"/>';
            res += '<input name="t_education_from_year[]" type="hidden" value="' + from_year + '"/>';
            res += '<input name="t_education_to_year[]" type="hidden" value="' + to_year + '"/>';
            res += '<input name="t_education_description[]" type="hidden" value="' + description + '"/>';


            $('.educations-list').after(res);

            data.find('input[name="education_school"]').val('');
            data.find('input[name="education_degree"]').val('');
            data.find('input[name="education_field_of_study"]').val('');
            data.find('input[name="education_grade"]').val('');
            data.find('textarea[name="education_activities_and_societies"]').val('');
            data.find('textarea[name="education_description"]').val('');

            $('#add-education').modal('hide');

        }

    });

    $('.add-education-cancel').on('click', function () {

        data.find('input[name="education_school"]').val('');
        data.find('input[name="education_degree"]').val('');
        data.find('input[name="education_field_of_study"]').val('');
        data.find('input[name="education_grade"]').val('');
        data.find('textarea[name="education_activities_and_societies"]').val('');
        data.find('textarea[name="education_description"]').val('');

        $('#add-education').modal('hide');

    });

    $('.add-skill').on('click', function () {

        var skill_item = $('.skill-item').val();

        if(!skill_item) {
            alert("skill item is required");
        } else {

            var res = '';
            res += '<li><i class="fa-li fa fa-check"></i>';
            res += skill_item;
            res += '</li>';
            res += '<input name="skills[]" type="hidden" value="' + skill_item + '"/>';

            $('.skill-list-ul').append(res);

            $('.skill-item').val('');

        }


    });

    $('.add-award').on('click', function () {

        var award_item = $('.award-item').val();

        if(!award_item) {
            alert("Awards & Certifications item is required");
        } else {

            var res = '';
            res += '<li><i class="fa-li fa fa-trophy text-warning"></i>';
            res += award_item;
            res += '</li>';
            res += '<input name="awards[]" type="hidden" value="' + award_item + '"/>';

            $('.award-list-ul').append(res);

            $('.award-item').val('');

        }

    });

})
