<script type="text/javascript">



$(document).ready(function(){
    $('#tabelaEquip').DataTable({
            "pageLength": 20,
            "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "search": "Pesquisar",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
            }
        });
    });

</script>