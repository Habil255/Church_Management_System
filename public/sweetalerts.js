function deleteCommitee() {
    // event.preventDefault();
    swal({
            title: "Are you sure to Delete this Record?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = "route('pastor.deleteMember', $account->id)";
                swal("Thank you!", {
                    title: "User has Deleted",
                    icon: "success",
                });
            } else {
                swal("Ok, The record is safe");
            }
        });
}

