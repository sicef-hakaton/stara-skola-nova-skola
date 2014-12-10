@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')

{{ Form::open() }}
<div id="container" class="col-lg-12">

    <div class="row col-lg-12">
        <div id="group-creator" class="col-lg-12" style="margin: 10px; margin-left: 45px; margin-right: 0;">
            <p id="breadcrumbs"></p>

            <div style="clear: both; height: 10px;"></div>
            <button id="add-group" type="button" class="btn btn-default">+ Add Group</button>
            <button id="back-group" style="display: none;" type="button" class="btn btn-default col-lg-2">Back</button>
            <div style="clear: both; height: 10px;"></div>

            <input id="group-count" name="group_count" type="hidden" value="0">

            <div id="hidden-group-ids">

            </div>

            <ul id="current-group">

            </ul>
        </div>
    </div>

    {{--<div style="clear:both;"></div>--}}

    <div id="two-cols" class='row col-lg-12'>
    <div id = "path-creator" class='col-lg-3'>
        <div class = "col-lg-12" >

            <div style="clear:both;"></div>

            <div class = "col-lg-12" >
                <input type="text" name="path_title" class="form-control" placeholder="Path title...">
            </div>

            <div style="clear:both; height: 10px;"></div>

            <div class = "col-lg-12" >
                <input type="text" name="path_tags" class="form-control" placeholder="Path tags...">
            </div>

            <div style="clear:both; height: 10px;"></div>

            <div class = "col-lg-12" >
                 <textarea name="path_description" class="form-control" placeholder="Path description..."></textarea>
            </div>

            <div style="clear:both; height: 10px;"></div>

            <div class = "col-lg-12" >
                <input type="submit" class="btn btn-default" value="Submit path">
            </div>
        </div>
    </div>

    <div class="col-lg-8"></div>

    <div id="step-creator" class="col-lg-9">
        <input id="step-count" name="step_count" type="hidden" value="0">
        <ul id="step-list" style="list-style-type: none">

            {{-- Steps go here --}}

        </ul>

        <button id="add-step" type="button" class="btn btn-default col-lg-2" style="margin-left: 20px; margin-top: 50px">Add Step</button>
     </div>
 </div>
 </div>

 {{Form::close()}}

@stop

@section('scripts')
    <script>
        function removeLastGroup() {
            var groupCountEl = document.getElementById("group-count");
            var groupCount = groupCountEl.getAttribute('value');

            if (groupCount == 0) {
                // If no groups are chosen then clear #current-group
                // and show add-group button instead of back-group
                $("#current-group").empty();
                $("#back-group").hide();
                $("#add-group").show();
                return;
            }

            var hiddenGroupIds = document.getElementById("hidden-group-ids");
            var lastInput = $(hiddenGroupIds).children().last();
            var lastGroupId = $(lastInput).attr("value");

            $(lastInput).remove();
            groupCountEl.setAttribute('value', (parseInt(groupCount) - 1).toString());

            updateBreadcrumbs();

            $.get( "/getGroup/" + lastGroupId, function( data ) {
                var group = JSON.parse(data);
                $.get( "/groupChildren/" + group.parent_id, function( data ) {
                    var obj = JSON.parse(data);
                    updateGroups(obj);
                });
            });
        }

        function addGroup() {
            $(this).hide();
            $("#back-group").show();

            $.get( "/groupChildren/-1", function( data ) {
                var obj = JSON.parse(data);
                updateGroups(obj);
            });
        }

        function chooseGroup() {
            var chosenGroupId = $(this).attr('value');
            var groupName = $(this).html();

            $.get( "/groupChildren/" + chosenGroupId, function( data ) {

                var groupCountEl = document.getElementById("group-count");
                var groupId = groupCountEl.getAttribute('value');
                groupCountEl.setAttribute('value', (parseInt(groupId) + 1).toString());
                var groupIds = document.getElementById("hidden-group-ids");

                $(groupIds).append(
                    '<input type="hidden" groupName="' + groupName + '" id="group_' + groupId + '" name="group_' + groupId + '" value="' + chosenGroupId + '" />'
                );

                updateBreadcrumbs();

                var obj = JSON.parse(data);
                updateGroups(obj);
            });
        }

        function updateGroups(obj) {
            var currentGroup = document.getElementById("current-group");
            $(currentGroup).empty();

            for (i = 0; i < obj.length; i++) {
                //console.log(obj[i].title);
                $(currentGroup).append(
                    '<li class="choose-group"><button type="button" value="' + obj[i].id
                        + '" class="btn btn-default">' + obj[i].title + '</button></li>'
                );
            }
        }

        function updateBreadcrumbs() {
            p = $("#breadcrumbs");
            var groupCountEl = document.getElementById("group-count");
            var groupCount = groupCountEl.getAttribute('value');

            breadcrumbs = "";
            for (i = 0; i < groupCount; i++) {
                var inputId = "group_" + i;
                var groupName = $("#" + inputId).attr("groupName");
                breadcrumbs += groupName;
                if (i < groupCount - 1) {
                    breadcrumbs += " > ";
                }
            }

            p.html(breadcrumbs);
        }

        function addStep() {
                    var x = document.getElementById("step-count");
                    var step_num = x.getAttribute('value');
                    x.setAttribute('value', (parseInt(step_num) + 1).toString());

                    var stepCode = '<li class="col-lg-4 li-step-entry" list-element-value="' + step_num + '"> \
                                                    <input id="link-count-' + step_num + '" name="link_count_' + step_num + '" type="hidden" value="0"> \
         \
                                                    <div class="panel panel-primary" style="height: 300px;"> \
                                                        <div class="panel-heading"> \
                                                          <div class="input-group"> \
                                                            <input type="text" name="step_' + step_num + '_title" class="form-control" placeholder="Step name..." > \
                                                          </div> \
                                                        </div> \
                                                        <div class="panel-body"> \
                                                            <div class="input-group"> \
                                                                <textarea name="step_' + step_num + '_description" class="form-control" placeholder="Step description..."></textarea> \
                                                            </div> \
                                                            <div style="height: 10px;"></div> \
                                                            <div class="input-group"> \
                                                                <button type="button" class="btn btn-default link-button" >Add Link</button> \
                                                            </div> \
        \
                                                        </div> \
                                                    </div> \
                                                 </li>';

                    $("#step-creator ul").append(
                        stepCode
                    );
                }

        function addLink() {
                    //console.log('puhi kurac');

                    var step_num = $(this).parents().eq(3).attr('list-element-value');

                    var x = document.getElementById("link-count-" + step_num);
                    var link_num = x.getAttribute('value');
                    x.setAttribute('value', (parseInt(link_num) + 1).toString() );

                    //alert("step_num = " + step_num + " link_num = " + link_num);

                    var linkCode;
                    linkCode ='<input type="text" name="link_' + step_num + '_' + link_num + '_title" class="form-control" placeholder="Link title...">';
                    linkCode += '<div style="height: 5px;"></div>';
                    linkCode+='<input type="text" name="link_' + step_num + '_' + link_num + '_url" class="form-control" placeholder="Link URL...">';
                    linkCode += '<div style="height: 5px;"></div>';
                    linkCode+='<textarea name="link_' + step_num + '_' + link_num + '_description" class="form-control" placeholder="Link description..."></textarea>';
                    linkCode += '<div style="height: 5px;"></div>';

                    $(this).parents('.li-step-entry').eq(0).find('.panel-body').append(linkCode);

                }

      $(document).ready( function() {

        $( "#add-step" ).click( addStep );
        $( "#step-creator" ).on( 'click', '.link-button', addLink );

        $("#current-group").on('click', '.choose-group button', chooseGroup);
        $("#back-group").click(removeLastGroup);
        $("#add-group").click(addGroup);

      });
    </script>
@stop