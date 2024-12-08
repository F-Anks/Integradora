// Nodo: Representa un elemento en la lista doblemente enlazada
class Nodo {
    constructor(dato, siguiente = null, anterior = null) {
        this.dato = dato;
        this.siguiente = siguiente;
        this.anterior = anterior;
    }
}

// Lista doblemente enlazada
class ListaDoblementeEnlazada {
    constructor() {
        this.inicio = null;
        this.fin = null;
    }

    insertarInicio(dato) {
        const nuevo = new Nodo(dato, this.inicio);
        if (this.inicio) {
            this.inicio.anterior = nuevo;
        } else {
            this.fin = nuevo;
        }
        this.inicio = nuevo;
    }

    insertarFinal(dato) {
        const nuevo = new Nodo(dato, null, this.fin);
        if (this.fin) {
            this.fin.siguiente = nuevo;
        } else {
            this.inicio = nuevo;
        }
        this.fin = nuevo;
    }

    eliminarInicio() {
        if (this.inicio) {
            const eliminado = this.inicio.dato;
            this.inicio = this.inicio.siguiente;
            if (this.inicio) {
                this.inicio.anterior = null;
            } else {
                this.fin = null;
            }
            return eliminado;
        }
        return null;
    }

    eliminarFinal() {
        if (this.fin) {
            const eliminado = this.fin.dato;
            this.fin = this.fin.anterior;
            if (this.fin) {
                this.fin.siguiente = null;
            } else {
                this.inicio = null;
            }
            return eliminado;
        }
        return null;
    }

    moverArriba(dato) {
        let actual = this.inicio;
        while (actual) {
            if (actual.dato === dato && actual.anterior) {
                // Intercambio de datos
                const temp = actual.dato;
                actual.dato = actual.anterior.dato;
                actual.anterior.dato = temp;
                break;
            }
            actual = actual.siguiente;
        }
    }

    moverAbajo(dato) {
        let actual = this.inicio;
        while (actual) {
            if (actual.dato === dato && actual.siguiente) {
                // Intercambio de datos
                const temp = actual.dato;
                actual.dato = actual.siguiente.dato;
                actual.siguiente.dato = temp;
                break;
            }
            actual = actual.siguiente;
        }
    }

    limpiar() {
        this.inicio = null;
        this.fin = null;
    }

    obtenerTodos() {
        const elementos = [];
        let actual = this.inicio;
        while (actual) {
            elementos.push(actual.dato);
            actual = actual.siguiente;
        }
        return elementos;
    }

    // Método de búsqueda
    buscar(dato) {
        let actual = this.inicio;
        while (actual) {
            if (actual.dato.toLowerCase() === dato.toLowerCase()) { // Comparación insensible a mayúsculas
                return true; // Archivo encontrado
            }
            actual = actual.siguiente;
        }
        return false; // Archivo no encontrado
    }
}

// Inicialización de la lista
const lista = new ListaDoblementeEnlazada();
const fileTable = document.getElementById("fileTable");

// Función para actualizar la tabla HTML
function actualizarTabla() {
    fileTable.innerHTML = "";
    const archivos = lista.obtenerTodos();
    archivos.forEach((archivo) => {
        const row = document.createElement("tr");

        // Columna de nombre
        const nameCell = document.createElement("td");
        nameCell.textContent = archivo;

        // Columna de acciones
        const actionCell = document.createElement("td");

        const upButton = document.createElement("button");
        upButton.textContent = "Mover arriba";
        upButton.className = "btn-move";
        upButton.addEventListener("click", () => {
            lista.moverArriba(archivo);
            actualizarTabla();
        });

        const downButton = document.createElement("button");
        downButton.textContent = "Mover abajo";
        downButton.className = "btn-move";
        downButton.addEventListener("click", () => {
            lista.moverAbajo(archivo);
            actualizarTabla();
        });

        actionCell.appendChild(upButton);
        actionCell.appendChild(downButton);

        row.appendChild(nameCell);
        row.appendChild(actionCell);
        fileTable.appendChild(row);
    });
}

// Botones de agregar
document.querySelector(".add-start-btn").addEventListener("click", () => {
    const input = document.querySelector("#new-file-content");
    const valor = input.value.trim();
    if (valor) {
        lista.insertarInicio(valor);
        input.value = "";
        actualizarTabla();
    }
});

document.querySelector(".add-end-btn").addEventListener("click", () => {
    const input = document.querySelector("#new-file-content");
    const valor = input.value.trim();
    if (valor) {
        lista.insertarFinal(valor);
        input.value = "";
        actualizarTabla();
    }
});

// Botones de eliminar
document.querySelector(".delete-start-btn").addEventListener("click", () => {
    lista.eliminarInicio();
    actualizarTabla();
});

document.querySelector(".delete-end-btn").addEventListener("click", () => {
    lista.eliminarFinal();
    actualizarTabla();
});

// Botón de limpiar
document.querySelector(".clear-all-btn").addEventListener("click", () => {
    lista.limpiar();
    actualizarTabla();
});

// Función para buscar archivo  
document.querySelector(".search-btn").addEventListener("click", () => {
    const input = document.querySelector("#new-file-content");
    const valor = input.value.trim();
    if (valor) {
        const encontrado = lista.buscar(valor); // Verifica si existe
        alert(encontrado ? `Archivo "${valor}" encontrado` : `Archivo "${valor}" no encontrado`);
    }
});
