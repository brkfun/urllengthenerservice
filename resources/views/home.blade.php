@include('header')
<h1>Generate Your URL</h1>
<form class="center vertical" method="POST" action="{{ route('sendUrl') }}">
    @csrf
    <div>
        <label for="link" class="left">Link:<span class="right">http(s)://*.*</span></label>
        <div style="display: inline-flex;width: 100%;">
        <input required type="url" maxlength="255" id="link" name="link" placeholder="https://google.com">
            <label style="min-width: max-content;margin: 0 15px;" for="expires" class="inline">One Click Only?</label>
            <input type="checkbox" id="expires" name="expires" />
        </div>
        <input class="medium green" type="submit" value="Generate">
    </div>
</form>
@include('footer')
