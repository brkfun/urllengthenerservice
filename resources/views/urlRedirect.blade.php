@include('header')
<div class="center">
    <button class="large green" onclick="myFunction()"><i class="fa fa-check-square"></i> Go To Link</button>
</div>
<script>
    function myFunction() {
        location.replace("{{ $url->url }}")
    }
</script>
@include('footer')
