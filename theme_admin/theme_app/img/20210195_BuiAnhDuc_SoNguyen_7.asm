# Hàm ki?m tra m?t s? có ph?i là s? chính phýõng không
# Input: $a0 là s? c?n ki?m tra
# Output: $v0 = 1 n?u là s? chính phýõng, $v0 = 0 n?u không ph?i
isPerfectSquare:
    addi $sp, $sp, -4    # C?p phát 4 byte trên ngãn x?p

    # Kh?i t?o bi?n ð?m i v?i giá tr? ban ð?u là 1
    li $t0, 1

    # V?ng l?p ki?m tra
    checkLoop:
        mul $t1, $t0, $t0       # Tính b?nh phýõng c?a i
        bgt $t1, $a0, True      # N?u b?nh phýõng c?a i l?n hõn s? ð?u vào, tr? v? false
        beq $t1, $a0, False     # N?u b?nh phýõng c?a i b?ng s? ð?u vào, tr? v? true

        # Tãng giá tr? c?a i lên 1 và ti?p t?c ki?m tra
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
# Hàm in ra các s? chính phýõng nh? hõn N
# Input: $a0 là s? N
printPerfectSquares:
    addi $sp, $sp, -12   # C?p phát 12 byte trên ngãn x?p
    sw $ra, 0($sp)       # Lýu ð?a ch? tr? v? trên ngãn x?p
    sw $s0, 4($sp)       # Lýu giá tr? c?a $s0 trên ngãn x?p
    sw $s1, 8($sp)       # Lýu giá tr? c?a $s1 trên ngãn x?p

    li $s0, 1            # Kh?i t?o s0 = 1

    loop:
        # Ki?m tra xem s0 có ph?i là s? chính phýõng hay không
        move $a0, $s0
        jal isPerfectSquare


restore:
        lw $ra, 0($sp)       # Khôi ph?c ð?a ch? tr? v? t? ngãn x?p
        addi $sp, $sp, 4     # Gi?i phóng 4 byte trên ngãn x?p
        jr $ra
