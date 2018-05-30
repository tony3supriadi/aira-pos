<template src="./library-component.html"></template>

<script>
    export default {
        data() {
            return {
                data: [
                    {
                        "content": "Water flood",
                        "flow_no": "FW201601010001",
                        "flow_type": "Repair",
                        "flow_type_code": "repair",
                    }, 
                    {
                        "content": "Lock broken",
                        "flow_no": "FW201601010002",
                        "flow_type": "Repair",
                        "flow_type_code": "repair",
                    }, 
                    {
                        "content": "Help to buy some drinks",
                        "flow_no": "FW201601010003",
                        "flow_type": "Help",
                        "flow_type_code": "help"
                    }
                ],
                titles : [
                    {
                        prop: "flow_no",
                        label: "NO."
                    }, 
                    {
                        prop: "content",
                        label: "Content"
                    }, 
                    {
                        prop: "flow_type",
                        label: "Type"
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
                                this.data.push({
                                    content: "hello world",
                                    flow_no: "FW201601010004",
                                    flow_type: "Help",
                                    flow_type_code: "help"
                                });
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
            }
        }
    };
</script>