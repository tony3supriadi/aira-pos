<template src="./library-component.html"></template>

<script>
    export default {
        data() {
            return {
                hide: true,
                show: false,
                data: [
                    {
                        "name": "Pocari Sweat 350 ML",
                        "categories": "Drink",
                    }
                ],
                titles : [
                    {
                        prop: "name",
                        label: "Name"
                    }, 
                    {
                        prop: "categories",
                        label: "Categories",
                        width: "250"
                    }
                ],
                actionsDef: {
                    colProps: {
                        span: 19
                    },
                    def: [
                        {
                            name: " New",
                            handler: () => {
                                this.toggleColumnWidth()
                            },
                            icon: "mdi mdi-plus-circle"
                        },
                        {
                            name: "import",
                            handler: () => {
                                this.$message("import clicked");
                            },
                            icon: "mdi mdi-cloud-upload",
                            buttonProps: {
                                type: 'text'
                            }
                        }
                    ]
                },
                paginationDef: {
                    pageSize: 10,
                    pageSizes: [10, 25, 50, 100],
                    currentPage: 1
                }
            };
        },
        methods: {
            getRowActionsDef() {
                let self = this;
                return [
                    {
                        type: "info",
                        handler(row) {
                            self.$message("Edit clicked");
                            console.log("Edit in row clicked", row);
                        },
                        name: "Edit"
                    }
                ];
            },
            handleRowClick(row, event, column) {
                this.$message(`${row.flow_no} is clicked`)
                console.log(row, event, column)
            },
            toggleColumnWidth() {
                this.hide = !this.hide
                this.show = !this.show
            }
        }
    };
</script>