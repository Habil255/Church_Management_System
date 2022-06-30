    var xx = "/pastor/search_commitee";
    // alert(url);
    $('#searchCommitee').typeahead({
        source: function (query, process) {
            return $.get(xx, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });







    var ss = "/accountant/member_contribute";
    // alert(ss);
    $('#memberContribute').typeahead({
        source: function (result, process) {
            return $.get(ss, {
                result: result
            }, function (data) {
                return process(data);
                // console.log(data);
            });
        }
    });