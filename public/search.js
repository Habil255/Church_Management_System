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

