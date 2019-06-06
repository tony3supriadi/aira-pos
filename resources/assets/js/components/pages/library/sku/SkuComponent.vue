<template src="./sku-component.html"></template>

<script>
export default {
  mounted() {
    this.all();
    this.itemLibrary();
  },
  data() {
    return {
      hide: true,
      show: false,
      form: "New",
      data: [],
      item: {},
      edit: {
        _method: "put"
      },
      newTitle: "",
      newShow: false,
      disabled: true,
      selectOptions: [],
      errors: [{ name: false, message: "" }],
      action: true,
      titles: [
        {
          prop: "sku",
          label: "SKU",
          width: "150"
        },
        {
          prop: "name",
          label: "NAME VARIANTS"
        },
        {
          prop: "price",
          label: "PRICE SELLING",
          width: "150"
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
              this.toggleColumnWidth();
            },
            icon: "mdi mdi-plus-circle"
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
    handleRowClick(row, event, column) {
      this.edit = row;

      if (this.form == "New") {
        this.hide = false;
        this.show = true;
      } else {
        if (this.item.id == row.id) {
          this.hide = !this.hide;
          this.show = !this.show;
        } else {
          this.hide = false;
          this.show = true;
        }
      }
      this.form = "Edit";
    },
    toggleColumnWidth() {
      this.item = {};
      this.newShow = false;

      if (this.form == "Edit") {
        this.hide = false;
        this.show = true;
      } else {
        this.hide = !this.hide;
        this.show = !this.show;
      }
      this.form = "New";
    },
    onDisabled() {
      if (this.item.sku && this.item.name && this.item.price) {
        this.disabled = false;
      } else {
        this.disabled = true;
      }
    },
    onChange() {
      axios.get("/api/library/" + this.item.itemId).then(response => {
        this.newTitle = response.data.name;
      });
      this.newShow = true;
    },
    itemLibrary() {
      axios.get("/api/library").then(response => {
        for (var i = 0; i < response.data.length; i++) {
          this.selectOptions[i] = {
            id: response.data[i].id,
            text: response.data[i].name
          };
        }
      });
    },
    all() {
      axios.get("/api/sku").then(response => {
        this.data = response.data;
      });
    },
    cancel() {
      this.item.id = "";
      this.hide = !this.hide;
      this.show = !this.show;
    },
    saved() {
      axios
        .post("/api/sku", this.item)
        .then(response => {
          this.all();
          this.edit = response.data;

          this.$swal({
            type: "success",
            title: "Congratulation. Category data has been saved",
            showConfirmButton: false,
            timer: 1500
          });
          this.form = "Edit";
        })
        .catch(errors => {
          this.$swal({
            type: "error",
            title: "Something wrong. Please try again!",
            text: errors
          });
        });
    },
    updated() {
      if (this.action) {
        axios
          .put("/api/sku/" + this.edit.id, this.edit)
          .then(response => {
            this.all();

            this.$swal({
              type: "success",
              title: "Congratulation. Category data has been updated",
              showConfirmButton: false,
              timer: 1500
            });
            this.form = "Edit";
          })
          .catch(errors => {
            this.$swal({
              type: "error",
              title: "Something wrong. Please try again!"
            });
          });
      }
    },
    deleted() {
      this.$swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete it!"
      }).then(result => {
        if (result.value) {
          axios
            .delete("/api/sku/" + this.edit.id)
            .then(response => {
              this.$swal("Deleted!", "Your file has been deleted.", "success");
            })
            .catch(errors => {
              this.$swal({
                type: "error",
                title: "Something wrong. Please try again!"
              });
            });
          this.all();

          this.hide = !this.hide;
          this.show = !this.show;
        }
      });
    }
  }
};
</script>
