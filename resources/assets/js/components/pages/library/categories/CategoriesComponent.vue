<template src="./categories-component.html"></template>

<script>
export default {
  mounted() {
    this.all()
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
      errors: [{ name: false, message: "" }],
      action: true,
      disbaled: true,
      titles: [
        {
          prop: "name",
          label: "Category Name"
        },
        {
          prop: "updated_at",
          label: "Updated At",
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
          }
        ]
      },
      paginationDef: {
        pageSize: 10,
        pageSizes: [10, 25, 50, 100],
        currentPage: 1
      }
    }
  },
  methods: {
    handleRowClick(row, event, column) {
      this.edit = row

      if (this.form == "New") {
        this.hide = false
        this.show = true
      } else {
        if (this.item.id == row.id) {
          this.hide = !this.hide
          this.show = !this.show
        } else {
          this.hide = false
          this.show = true
        }
      }
      this.form = "Edit"
    },
    toggleColumnWidth() {
      this.item.name = ""

      if (this.form == "Edit") {
        this.hide = false
        this.show = true
      } else {
        this.hide = !this.hide
        this.show = !this.show
      }
      this.form = "New"
    },
    onDisabled() {
      if (this.item.name || this.edit.name) {
        this.disbaled = false
      } else {
        this.disbaled = true
      }
    },
    cancel() {
      this.item.id = ""
      this.hide = !this.hide
      this.show = !this.show
    },
    all() {
      axios.get("/api/category").then(response => {
        this.data = response.data
      })
    },
    create() {
      if (this.action) {
        axios
          .post("/api/category", this.item)
          .then(response => {
            this.all()
            this.edit = {
              id: response.data.id,
              name: response.data.name
            }

            this.$swal({
              type: "success",
              title: "Congratulation. Category data has been saved",
              showConfirmButton: false,
              timer: 1500
            })
            this.form = "Edit"
          })
          .catch(errors => {
            this.$swal({
              type: "error",
              title: "Something wrong. Please try again!",
              text: errors
            })
          })
      }
    },
    update(id) {
      if (this.action) {
        axios
          .put("/api/category/" + id, this.edit)
          .then(response => {
            this.all()

            this.$swal({
              type: "success",
              title: "Congratulation. Category data has been updated",
              showConfirmButton: false,
              timer: 1500
            })
            this.form = "Edit"
          })
          .catch(errors => {
            this.$swal({
              type: "error",
              title: "Something wrong. Please try again!"
            })
          })
      }
    },
    deleteAction(id) {
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
            .delete("/api/category/" + id)
            .then(response => {
              this.$swal("Deleted!", "Your file has been deleted.", "success")
            })
            .catch(errors => {
              this.$swal({
                type: "error",
                title: "Something wrong. Please try again!"
              })
            })
          this.all()

          this.hide = !this.hide
          this.show = !this.show
        }
      })
    }
  }
}
</script>
