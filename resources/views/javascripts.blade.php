@push('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function sweet() {
                // event.preventDefault();
                swal({
                        title: "Are you sure to Delete this?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "{{ route('resource.delete', $resource->id) }}";
                            swal("Thank You!!!", {
                                title: "The Record has been Deleted",
                                icon: "success",
                            });
                        } else {
                            swal("Ok, The record is safe");
                        }
                    });
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
        <script>
            $(function() {
                $('#dob').text(new Date().getFullYear());
            });
        </script>
    @endpush