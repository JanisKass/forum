@extends('main')
@section('content')



<h3 class="mb0">Search <input type="text" id="search"></h3>
    </div>

<script type="text/javascript">
$("#search").keyup( function () {
    $.post("/threads/search", { search: $('#search').val() }, function(data) {
        $('.prod').html('');
        $.each(data, function(i, thread) {
            var prod = '<div class="grid_3"><div class="box"><div class="maxheight"><a href="/threads/view/'+thread.id+'">'+thread.title+'</a></div></div>';
             $('.prod').append(prod);
        });
    });
});
 </script>
 
<div class="prod">
@stop