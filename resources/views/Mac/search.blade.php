<!DOCTYPE html>

<html>

    <head>

        <title>Autocomplete</title>
        <link rel="stylesheet" href="/code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    </head>

    <body>
<div class="row">
    <div class="col-md-6 col-lg-offset-3">
        <section class="panel panel-default">
            <header class="panel-heading">
                <input type="text" name="searchname" class="form-control" id="searchname" placeholder="Search">
            </header>
        </section>
    </div>
</div>
<table>
    <tr>
        <td>ID</td>
        <td><input type="text" name="id" id="id" class="form-control" placeholder="ID"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Nome</td>
        <td><input type="text" name="name" id="name" class="form-control" placeholder="Nome"></td>
    </tr>
</table>

    </body>
<script type="text/javascript">
    $('#searchname').autocomplete({
        source : '{!!URL::route('autocomplete') !!}',
        minlenght:1,
        autoFocus:true,
        select:function(e,ui){
            $('#id').val(ui.item.id);
            $('#name').val(ui.item.value);
        }
    })
</script>

</html>

