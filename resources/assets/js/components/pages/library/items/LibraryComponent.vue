<template src="./library-component.html"></template>

<script>
export default {
  mounted() {
    this.all()
    this.categories()
  },
  data() {
    return {
      hide: true,
      show: false,
      form: "New",
      item: {
        name: "",
        categoryId: "",
        image: "",
        description: "",
        variants: []
      },
      edit: {
        _method: "put"
      },
      variants: {},
      disabled: true,
      selectOptions: [],
      data: [],
      titles: [
        {
          prop: "name",
          label: "Name"
        },
        {
          prop: "categoryName",
          label: "Categories",
          width: "130"
        },
        {
          prop: "created_at",
          label: "Created At",
          width: "180"
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
      this.edit = {
        id: row.id,
        name: row.name,
        categoryId: row.categoryId,
        description: row.description
      }

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
      if (this.form == "Edit") {
        this.hide = false
        this.show = true
      } else {
        this.hide = !this.hide
        this.show = !this.show
      }
      this.form = "New"

      this.item = {
        name: "",
        categoryId: "",
        image: "",
        description: "",
        variants: []
      }
    },
    onDisabled() {
      if (this.variants.sku && this.variants.name && this.variants.price) {
        this.disabled = false
      } else {
        this.disabled = true
      }
    },
    onSubmit() {
      if (this.variants.sku && this.variants.name && this.variants.price) {
        this.item.variants.push(this.variants)
      }
    },
    onReset() {
      this.variants = {}
    },
    onRemove(index) {
      this.item.variants.splice(index, 1)
    },
    categories() {
      axios.get("/api/category").then(response => {
        for (var i = 0; i < response.data.length; i++) {
          this.selectOptions[i] = {
            id: response.data[i].id,
            text: response.data[i].name
          }
        }
      })
    },
    all() {
      axios.get("/api/library").then(response => {
        this.data = response.data
      })
    },
    saved() {
      axios
        .post("/api/library", this.item)
        .then(response => {
          this.all()
          this.edit = {
            id: response.id,
            name: response.name,
            categoryId: response.categoryId,
            description: response.description
          }
          this.$swal({
            type: "success",
            title: "Your work has been saved",
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
    },
    updated() {
      axios
        .put("/api/library/" + this.edit.id, this.edit)
        .then(response => {
          this.all()
          this.$swal({
            type: "success",
            title: "Your work has been saved",
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
    },
    cancel() {
      this.hide = !this.hide
      this.show = !this.show
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
            .delete("/api/library/" + this.edit.id)
            .then(response => {
              this.all()
              this.$swal("Deleted!", "Your file has been deleted.", "success")
              
              this.hide = !this.hide
              this.show = !this.show
            })
            .catch(errors => {
              this.$swal({
                type: "error",
                title: "Something wrong. Please try again!",
                text: errors
              })
            })
        }
      })
    }
  }
}
</script>