# H�m ki?m tra m?t s? c� ph?i l� s? ch�nh ph��ng kh�ng
# Input: $a0 l� s? c?n ki?m tra
# Output: $v0 = 1 n?u l� s? ch�nh ph��ng, $v0 = 0 n?u kh�ng ph?i
isPerfectSquare:
    addi $sp, $sp, -4    # C?p ph�t 4 byte tr�n ng�n x?p

    # Kh?i t?o bi?n �?m i v?i gi� tr? ban �?u l� 1
    li $t0, 1

    # V?ng l?p ki?m tra
    checkLoop:
        mul $t1, $t0, $t0       # T�nh b?nh ph��ng c?a i
        bgt $t1, $a0, True      # N?u b?nh ph��ng c?a i l?n h�n s? �?u v�o, tr? v? false
        beq $t1, $a0, False     # N?u b?nh ph��ng c?a i b?ng s? �?u v�o, tr? v? true

        # T�ng gi� tr? c?a i l�n 1 v� ti?p t?c ki?m tra
        addi $t0, $t0, 1
        j checkLoop

    # K?t qu? tr? v?
    True:
        li $v0, 1
        j store
	
    False:
        li $v0, 0
	jr $ra
 	store:
 	sw $t1 (0)$sp
 	jal printPerfectSquares
# H�m in ra c�c s? ch�nh ph��ng nh? h�n N
# Input: $a0 l� s? N
printPerfectSquares:
    addi $sp, $sp, -12   # C?p ph�t 12 byte tr�n ng�n x?p
    sw $ra, 0($sp)       # L�u �?a ch? tr? v? tr�n ng�n x?p
    sw $s0, 4($sp)       # L�u gi� tr? c?a $s0 tr�n ng�n x?p
    sw $s1, 8($sp)       # L�u gi� tr? c?a $s1 tr�n ng�n x?p

    li $s0, 1            # Kh?i t?o s0 = 1

    loop:
        # Ki?m tra xem s0 c� ph?i l� s? ch�nh ph��ng hay kh�ng
        move $a0, $s0
        jal isPerfectSquare


restore:
        lw $ra, 0($sp)       # Kh�i ph?c �?a ch? tr? v? t? ng�n x?p
        addi $sp, $sp, 4     # Gi?i ph�ng 4 byte tr�n ng�n x?p
        jr $ra
