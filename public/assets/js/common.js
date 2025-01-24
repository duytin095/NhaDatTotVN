function createDataTable(tableId, columns, options = {}) {
    return $(`#${tableId}`).DataTable({
      ...dataTableOptions,
      "columns": columns,
      ...options
    });
  }