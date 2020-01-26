---
title: Login
---
@extends('_layouts.master')
@section('body')
<section class="section-content padding-y">
    <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
        <div class="card-body">
            <h4 class="card-title mb-4">Fake sign in</h4>
            <form method="GET" action="{{ $page->baseUrl }}/private.json" id="login">
                <div class="form-group">
                   <input name="username" class="form-control" placeholder="Username" type="text">
                </div>
                <div class="form-group">
                  <input name="password" class="form-control" placeholder="Password" type="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
$("#login").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data)
        {
            alert('Welcome '+$('#login input[name=username]').val())
        }
    });
});
</script>
@endsection