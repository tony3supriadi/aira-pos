<template src="./module-component.html"></template>

<script>
export default {
  mounted() {
    this.all();
    this.changeModule();
  },
  data() {
    return {
      item: {
        sort: ""
      },
      btnDisable: true,
      btnDelete: false,
      subModule: false,
      textTitle: "Add New",
      parents: [],

      data: [],

      titles: [
        {
          prop: "sort",
          label: "Sorting",
          width: "100"
        },
        {
          prop: "name",
          label: "Name Module"
        }
      ],
      paginationDef: {
        pageSize: 7,
        pageSizes: [7, 10, 25, 50, 100],
        currentPage: 1
      }
    };
  },
  methods: {
    all() {
      var index = 0;
      axios.get("/api/module").then(response => {
        this.data = response.data;
      });
    },
    saved() {
      axios
        .post("/api/module", this.item)
        .then(response => {
          this.item = {
            sort: ""
          };
          this.subModule = false;

          this.all();
          this.changeModule();

          this.$swal({
            type: "success",
            title: "Congratulation. Module data has been saved",
            showConfirmButton: false,
            timer: 1500
          });
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
      this.item._method = "put";
      axios
        .put("/api/module/" + this.item.id, this.item)
        .then(response => {
          this.item = response.data;
          if (response.data.parent) {
            this.subModule = true;
          } else {
            this.subModule = false;
          }

          this.all();
          this.changeModule();

          this.$swal({
            type: "success",
            title: "Congratulation. Module data has been saved",
            showConfirmButton: false,
            timer: 1500
          });
        })
        .catch(errors => {
          this.$swal({
            type: "error",
            title: "Something wrong. Please try again!",
            text: errors
          });
        });
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
            .delete("/api/module/" + this.item.id)
            .then(response => {
              this.all();
              this.onReset();
              this.$swal("Deleted!", "Your file has been deleted.", "success");
            })
            .catch(errors => {
              this.$swal({
                type: "error",
                title: "Something wrong. Please try again!",
                text: errors
              });
            });
        }
      });
    },

    onInput() {
      this.btnDisable = this.item.name ? false : true;
    },
    onChange() {
      axios.get("/api/module/" + this.item.parent).then(response => {
        this.item.sort = response.data.sort + ".";
      });
    },
    onReset() {
      this.item = {
        sort: ""
      };
      this.subModule = false;
      this.btnDisable = true;
      this.btnDelete = false;
    },
    onClickRowTable(row, event, column) {
      if (row.parent) {
        this.subModule = true;
      } else {
        this.subModule = false;
      }

      row.name = row.name.split(" - ")[row.name.split(" - ").length - 1];

      this.item = row;
      this.btnDisable = false;
      this.btnDelete = true;
    },

    changeModule() {
      var index = 0;
      axios.get("/api/module").then(response => {
        for (var i = 0; i < response.data.length; i++) {
          this.parents[i] = {
            id: response.data[i].id,
            text: response.data[i].name
          };
        }
      });
    }
  }
};
</script>
