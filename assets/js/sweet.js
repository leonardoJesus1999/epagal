function confirmarEliminar(url, tablaName) {
	Swal.fire({
		title: "Confirmar eliminación",
		text: `¿Está seguro de eliminar este registro de ${tablaName}?`,
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Si, eliminar",
		cancelButtonText: "Cancelar",
	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = url;
			Swal.fire({
				title: "Eliminado!",
				text: "El registro ha sido eliminado correctamente.",
				icon: "success",
			});
		}
	});
}
