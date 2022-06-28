    var xx = "/pastor/search_commitee";
    // alert(url);
    $('#searchCommitee').typeahead({
        source: function (query, process) {
            return $.get(xx, {
                query: query
            }, function (data) {
                // alert(data);
                return process(data);
                // console.log(data);
                // // console.log(data);
            });
        }
    });

