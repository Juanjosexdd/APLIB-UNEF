<div x-data="{ open: false }" x-show="open"
    @confirm-delete.window="
        Swal.fire({
            title: 'Estas seguro?',
            text: 'No podrás revertir esto.!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1f2937',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'Su registro ha sido eliminado.',
                        icon: 'success'
                    })
                } else if (result.dismiss === Swal.DismissReason.cancel){
                    title: 'Cancelled',
                    text: 'Your imaginary file is safe :)',
                    icon: 'error'
                }
            })
">
</div>
