<template src="./inventory-component.html"></template>

<script>
let CsvExport = function(data, fields, fieldNames, fileName) {
  try {
    var result = json2csv({
      data: data,
      fields: fields,
      fieldNames: fieldNames
    });
    var csvContent = "data:text/csvcharset=GBK,\uFEFF" + result;
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", `${fileName || "file"}.csv`);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  } catch (err) {
    console.error(err);
  }
};

export default {
  data() {
    return {
      data: [
        {
          content: "Water flood",
          flow_no: "FW201601010001",
          flow_type: "Repair",
          flow_type_code: "repair"
        },
        {
          content: "Lock broken",
          flow_no: "FW201601010002",
          flow_type: "Repair",
          flow_type_code: "repair"
        },
        {
          content: "Help to buy some drinks",
          flow_no: "FW201601010003",
          flow_type: "Help",
          flow_type_code: "help"
        }
      ],
      titles: [
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
      filters: [
        {
          prop: "flow_no",
          value: ""
        }
      ],
      actionCol: {
        props: {
          label: "Actionssss"
        },
        buttons: [
          {
            props: {
              type: "primary"
            },
            handler: row => {
              this.$message("Edit clicked");
              row.flow_no = "hello word" + Math.random();
              row.content = Math.random() > 0.5 ? "Water flood" : "Lock broken";
              row.flow_type = Math.random() > 0.5 ? "Repair" : "Help";
            },
            label: "Edit"
          },
          {
            handler: row => {
              this.data.splice(this.data.indexOf(row), 1);
              this.$message("delete success");
            },
            label: "delete"
          }
        ]
      },
      selectedRow: []
    };
  },
  methods: {
    onCreate() {
      this.data.push({
        content: "new created",
        flow_no: "FW201601010003" + Math.floor(Math.random() * 100),
        flow_type: "Help",
        flow_type_code: "help"
      });
    },
    onCreate100() {
      [...new Array(100)].map(_ => {
        this.onCreate();
      });
    },
    handleSelectionChange(val) {
      this.selectedRow = val;
    },
    bulkDelete() {
      this.selectedRow.map(row => {
        this.data.splice(this.data.indexOf(row), 1);
      });
      this.$message("bulk delete success");
    }
  }
};
</script>
