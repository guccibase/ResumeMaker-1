<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/resume.min.js') }}"></script>

<script>

    $(".country").select2({
        placeholder: "Select a Country",
    });

    $(".experience_from_year").select2({
        placeholder: "Select a Year",
    });
    $(".experience_from_year").select2("val", "");

    $(".experience_from_month").select2({
        placeholder: "Select a Month",
    });

    $(".experience_to_year").select2({
        placeholder: "Select a Year",
    });

    $(".experience_to_month").select2({
        placeholder: "Select a Month",
    });

    $(".education_from_year").select2({
        placeholder: "Select a Year",
    });

    $(".education_to_year").select2({
        placeholder: "Select a Year",
    });

</script>