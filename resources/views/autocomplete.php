<?php
# form file
.
.
{{ Form::hidden('to_introducer_id', Input::old('to_introducer_id'),array('id'=>'to_introducer_id'))}}
<div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label" for="introducer_no">Introducer :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="introducer_no" id="introducer_no" value="{{{ Input::old('introducer_no', isset($associate) ? $associate->introducer_no : null) }}}" />
            </div>
        </div>
    </div>
    <!-- ./ introducer_id -->

    <!-- rank_id -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label" for="rank_id">Rank :</label>
            <div class="col-md-8">
                {{ Form::select('rank_id',$rank ,isset($associate) ? $associate->rank_id : null, array('class'=>'form-control ' ,'id' =>'rank_id'))}}
                // $rank  = Rank::lists('rankname', 'id'); use of list method can be noted
            </div>
        </div>
    </div>

// javascipt part
$(function(){
    $('#introducer_no').autocomplete({
      source: "add_to_introducer_id",
      select: function(event, ui){
        $('#to_introducer_id').val(ui.item.id);
        $.get("add_to_rank_list",{rank_id: ui.item.rank_id}, function(data,status){
            $('#rank_id').empty();
            $.each(data, function(index, item) {
                var opt = $('<option />');
                opt.val(data[index].id);
                opt.text(data[index].rankname);
                $('#rank_id').append(opt);
            });
        });
      }
    });
  });