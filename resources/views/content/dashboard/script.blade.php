<script>
    $(document).ready(function() {
        $('#eqipment_schedule_table').DataTable({
            scrollY: 200,
            scrollX: true,
        });
    });
</script>

{{-- wo status --}}
<script>
    var ctx = document.getElementById("canvas");
    var value = {{ Js::from($value) }};
    var label = {{ Js::from($label) }};
    console.log(value);
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: "Document",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: value,
                barThickness: 20,
            }],
        },
        options: {
            elements: {
                rectangle: {
                    borderWidth: 2,
                    borderColor: 'rgb(0, 255, 0)',
                    borderSkipped: 'bottom'
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                }
            },
            scales: {
                y: {
                    max: 15,
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },

                },
                x: {
                    grid: {
                        border: {
                            color: 'red',
                        }
                    }
                }
            }

        }
    });
</script>
